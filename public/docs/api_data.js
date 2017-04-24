define({ "api": [
  {
    "type": "get",
    "url": "/",
    "title": "Status de l'application",
    "name": "check",
    "group": "Application",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"status\": \"ok\",\n  \"version\": \"0.0.1\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/ApiController.php",
    "groupTitle": "Application"
  },
  {
    "type": "post",
    "url": "/auth",
    "title": "Login",
    "name": "Login",
    "group": "Auth",
    "description": "<p>Connexion à API via login / password</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Adresse email</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>Mot de passe</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "user",
            "description": "<p>Information sur l'utilisateur</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 401": [
          {
            "group": "Error 401",
            "type": "Object",
            "optional": false,
            "field": "connected",
            "description": "<p>Si false, mauvais login / password de connexion</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/ApiController.php",
    "groupTitle": "Auth"
  },
  {
    "type": "get",
    "url": "/client",
    "title": "Liste des clients",
    "name": "Liste",
    "group": "Client",
    "description": "<p>Renvoie la liste de touts les clients</p>",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "Client",
            "description": "<p>Liste des clients</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/ApiController.php",
    "groupTitle": "Client"
  },
  {
    "type": "post",
    "url": "/client",
    "title": "Crée un nouveau client",
    "group": "Client",
    "description": "<p>Crée un nouveau client</p>",
    "success": {
      "fields": {
        "Success 201": [
          {
            "group": "Success 201",
            "type": "Object",
            "optional": false,
            "field": "client",
            "description": "<p>Retourne les information du client</p>"
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>ID du client</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "civilite",
            "description": "<p>Sexe du client</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "nom",
            "description": "<p>Nom du client</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "prenom",
            "description": "<p>Prénom du client</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "adresse",
            "description": "<p>Adresse du client</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "codepostal",
            "description": "<p>Code Postal</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "ville",
            "description": "<p>Ville</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Adresse email</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "telephone",
            "description": "<p>Téléphone</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "created_at",
            "description": "<p>Date de création</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 500": [
          {
            "group": "Error 500",
            "type": "Object",
            "optional": false,
            "field": "message",
            "description": "<p>Message erreur</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/ApiController.php",
    "groupTitle": "Client",
    "name": "PostClient"
  },
  {
    "type": "post",
    "url": "/devis",
    "title": "Crée un devis",
    "group": "Devis",
    "description": "<p>Crée un nouveau devis valider par le client</p>",
    "success": {
      "fields": {
        "Success 201": [
          {
            "group": "Success 201",
            "type": "Object",
            "optional": false,
            "field": "devis",
            "description": "<p>Information sur le devis</p>"
          },
          {
            "group": "Success 201",
            "type": "Object",
            "optional": false,
            "field": "modules",
            "description": "<p>Liste des modules du devis</p>"
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "nom",
            "description": "<p>Intitule du devis</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "montant",
            "description": "<p>Montant du devis</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "id_utilisateur",
            "description": "<p>Id du commercial</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "id_client",
            "description": "<p>Id du client</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>Status du devis : 'Brouillon','En attente','Refusé','Accepté','En commande','En faturation','Clôturé'</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "etape",
            "description": "<p>Etape du devis : 'Devis_ouvert','Signature_devis','Permis_construire','Ouverture_chantier','Achevement_fondation','Achevement_mur','Achevement_etanche','Travaux_equipement','Remise_cle'</p>"
          },
          {
            "group": "Parameter",
            "type": "Object",
            "optional": false,
            "field": "modules",
            "description": "<p>ID des modules séparer par un &quot;;&quot;</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 500": [
          {
            "group": "Error 500",
            "type": "Object",
            "optional": false,
            "field": "message",
            "description": "<p>Message erreur</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/ApiController.php",
    "groupTitle": "Devis",
    "name": "PostDevis"
  },
  {
    "type": "get",
    "url": "/synchronisation",
    "title": "Données pour utilisation offlines",
    "name": "synchronisation",
    "group": "Synchronisation",
    "description": "<p>Les données sont à sauvegarder dans le local Storage de la tablette android pour un traitment offline.</p>",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "gammes",
            "description": "<p>Liste des gammes</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "ligneProduit",
            "description": "<p>Liste des produits</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "reference",
            "description": "<p>Liste des références</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "modules",
            "description": "<p>Liste des modules</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/ApiController.php",
    "groupTitle": "Synchronisation"
  }
] });
