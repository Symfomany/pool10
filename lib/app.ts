/// <reference path="../typings/index.d.ts" />

import * as Default from "./conf";


/**
 * class Animal
 */
export class Animal{

  protected name:string;
  protected couleur:string;
  protected poid:any;

  constructor(name:string, couleur:string, poid:any){
    this.name = name;
    this.couleur = couleur;
    this.poid = poid;
    console.log(_.range(4));
    var tab:any;
    var url = 'https://jsonplaceholder.typicode.com/users';
  }


  public function xhr():void{
      let promise;
      promise = new Promise(function(resolve:any, reject:any):any {
        // faire un truc, peut-être asynchrone, puis…
        // Fais le boulot XHR habituel

          let url = "https://jsonplaceholder.typicode.com/users";
          var req = new XMLHttpRequest();
          req.open('GET', url);
          req.onload = function() {
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
          req.onerror = function() {
            reject(Error("Erreur réseau"));
          };
          // Lance la requête
          req.send();


      }).then(function(result) {
        console.log(result);
      }, function(err) {
        console.log(err);
      });

    }
}
