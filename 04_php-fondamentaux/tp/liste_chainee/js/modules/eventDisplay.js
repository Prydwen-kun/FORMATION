

class eventDisplay {
    constructor(adressArray) {
        this.adresses = adressArray;
        this.marker = [];
    }

    get_adresses() {
        return this.adresses;
    }
}

export { eventDisplay };