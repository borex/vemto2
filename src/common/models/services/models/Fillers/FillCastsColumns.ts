import Model from "@Common/models/Model"
import Column from "@Common/models/Column"

export default new class FillCastsColumns {
    model: Model

    onModel(model: Model) {
        this.setModel(model)
        this.fill()
    }

    setModel(model: Model): FillCastsColumns {
        this.model = model

        return this
    }

    fill() {
        this.model.casts.forEach((columnName: string) => {
            const column: Column = this.model.table.findColumnByName(columnName)

            if(!column) return

            this.model.relation("castsColumns").attachUnique(column)
        })
    }
}