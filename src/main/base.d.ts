declare module "custom-electron-titlebar/main" {
  import type cetMain from "custom-electron-titlebar/dist/main/main";
  
  export const setupTitlebar: typeof cetMain.setupTitlebar;
  export const attachTitlebarToWindow: typeof cetMain.attachTitlebarToWindow;
}