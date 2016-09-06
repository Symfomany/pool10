"use strict";
class Animal {
    constructor(name, couleur, poid) {
        this.function = xhr();
        this.name = name;
        this.couleur = couleur;
        this.poid = poid;
        console.log(_.range(4));
        var tab;
        var url = 'https://jsonplaceholder.typicode.com/users';
    }
}
exports.Animal = Animal;
void {
    let: promise,
    promise = new Promise(function (resolve, reject) {
        let url = "https://jsonplaceholder.typicode.com/users";
        var req = new XMLHttpRequest();
        req.open('GET', url);
        req.onload = function () {
            if (req.status == 200) {
                resolve(req.response);
            }
            else {
                reject(Error(req.statusText));
            }
        };
        req.onerror = function () {
            reject(Error("Erreur réseau"));
        };
        req.send();
    }).then(function (result) {
        console.log(result);
    }, function (err) {
        console.log(err);
    })
};
