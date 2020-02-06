import Contract from "./Contract";

export default class Trial {
    contract1;
    contract2;

    constructor(contract1, contract2) {
        if (!(contract1 instanceof Contract)) {
            throw new Error("Argument 1 must be type Contract");
        }

        if (!(contract2 instanceof Contract)) {
            throw new Error("Argument 1 must be type Contract");
        }

        this.contract1 = contract1;
        this.contract2 = contract2;
    }

    get winner () {
        if (this.contract1.points > this.contract2.points) {
            return this.contract1;
        } else if (this.contract1.points > this.contract2.points) {
            return this.contract2;
        }
        return null;
    }

    get toObject () {
        let message = 'Tie!';
        let party1 =  "Party 1 (" + this.contract1.points  + " points)";
        let party2 =  "Party 2 (" + this.contract2.points  + " points)";
        if (this.contract1.points > this.contract2.points) {
            message = party1 + "has won "+ party2;
        } else if (this.contract1.points < this.contract2.points) {
            message = party2 + "has won "+ party1;
        }
        return {
            "winner": this.winner === null ? null : (this.contract1 ? 1 : 2),
            "message": message,
        };
    }
}
