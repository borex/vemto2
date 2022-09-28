import { Titlebar, Color } from "custom-electron-titlebar"
import { contextBridge, ipcRenderer } from "electron"

window.addEventListener('DOMContentLoaded', () => {
    new Titlebar({
        backgroundColor: Color.fromHex('#2f3241'),
        icon: "",
        // icon: join(__dirname, "..", "renderer", "assets", "icon.png"),
        // // menu: null,
        // maximizable: true,
        // minimizable: true,
        // shadow: true,
        // titleHorizontalAlignment: "left",
        // titleVerticalAlignment: "center",
        // unfocusEffect: true,
        // useCustomWindowControls: true,
        // windowControlsStyle: {
        //     backgroundColor: "#1e1e1e",
        //     buttons: {
        //         close: "#ff5555",
        //         closeHover: "#ff5555",
        //         maximize: "#50fa7b",
        //         maximizeHover: "#50fa7b",
        //         minimize: "#f1fa8c",
        //         minimizeHover: "#f1fa8c",
        //         restore: "#8be9fd",
        //         restoreHover: "#8be9fd",
        //     },
        // },
    })
})

contextBridge.exposeInMainWorld("api", {
    loadSchema: (path: string) => { 
        ipcRenderer.invoke("get:project:schema", path) 
    },
    onSchemaLoaded: (callback: (data: any) => void) => { 
        ipcRenderer.on("data:project:schema", (event, data) => callback(data))
    },
    offSchemaLoaded: () => {
        ipcRenderer.removeAllListeners("data:project:schema")
    }
})
