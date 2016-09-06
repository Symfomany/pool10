(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
/// <reference path="../typings/index.d.ts" />
"use strict";
/**
 * class Animal
 */
class Animal {
    constructor(name, couleur, poid) {
        this.name = name;
        this.couleur = couleur;
        this.poid = poid;
        console.log(_.range(4));
        var tab;
        var url = 'https://jsonplaceholder.typicode.com/users';
        $.getJSON(url, function (data) {
            tab = data;
        });
        var promise = new Promise(function (resolve, reject) {
            // faire un truc, peut-être asynchrone, puis…
            // Fais le boulot XHR habituel
            let url = "https://jsonplaceholder.typicode.com/users";
            var req = new XMLHttpRequest();
            req.open('GET', url);
            req.onload = function () {
                // Ceci est appelé même pour une 404 etc.
                // aussi vérifie le statut
                if (req.status == 200) {
                    // Accomplit la promesse avec le texte de la réponse
                    resolve(req.response);
                }
                else {
                    // Sinon rejette avec le texte du statut
                    // qui on l’éspère sera une erreur ayant du sens
                    reject(Error(req.statusText));
                }
            };
            // Gère les erreurs réseau
            req.onerror = function () {
                reject(Error("Erreur réseau"));
            };
            // Lance la requête
            req.send();
        }).then(function (result) {
            console.log(result); // "Ces trucs ont marché !"
        }, function (err) {
            console.log(err); // Error: "Ça a foiré"
        });
        console.log(tab);
    }
}
exports.Animal = Animal;

},{}],2:[function(require,module,exports){
"use strict";
const app_1 = require('./app');
let chien = new app_1.Animal("Moka", "noir", { "taille": 30, poid: 1.5 });
console.log(chien);
console.log('okayyy');

},{"./app":1}]},{},[2])


//# sourceMappingURL=app.js.map
