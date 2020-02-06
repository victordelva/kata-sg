const rolePoints = {
    K: 5,
    N: 2,
    V: 1,
};

const invalidators = {
    V: 'K',
};

export default class Contract {
    #roles = Array();

    constructor(roles = '') {
        this.#roles = roles;
    }

    set roles (roles) {
        this.#roles = Array.from(roles);
    }

    get rolesString () {
        return this.#roles.join('');
    }

    get points () {
        let points = 0;
        let self = this;
        (this.#roles || []).map(function (role) {
            if (!(undefined !== typeof invalidators[role] && (self.#roles || []).includes(invalidators[role]))) {
                points += rolePoints[role];
            }
        });
        return points;
    }
}
