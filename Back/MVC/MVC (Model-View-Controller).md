
Le terme MVC (Model-View-Controller) désigne un modèle architectural utilisé en génie logiciel pour la création d'applications, notamment les interfaces utilisateur. Il s'agit de diviser l'application en trois composants interconnectés, chacun ayant une responsabilité distincte. Voici une description des trois composants du modèle MVC :

1. **Modèle (Model)** :
    - Le modèle représente les données de l'application et la logique métier. Il est responsable de la gestion des données, de leur validation, de leur logique et de leur persistance (par exemple, dans une base de données).
    - Il notifie la vue des modifications de données pour permettre la mise à jour de l'affichage.
2. **Vue (View)** :
    - La vue est responsable de la présentation des données. Elle affiche les données du modèle à l'utilisateur.
    - Elle est indépendante de la logique métier et se concentre uniquement sur la manière dont les données sont présentées.
    - La vue écoute les notifications du modèle pour mettre à jour l'affichage en fonction des changements de données.
3. **Contrôleur (Controller)** :
    - Le contrôleur gère les interactions de l'utilisateur. Il interprète les entrées de l'utilisateur (comme les clics de souris, les frappes au clavier) et les traduit en actions à exécuter par le modèle ou la vue.
    - Le contrôleur récupère les données du modèle, les prépare et les envoie à la vue pour l'affichage.
    - Il sert de médiateur entre le modèle et la vue.

### Fonctionnement

- **Interactions utilisateur** : L'utilisateur interagit avec l'interface utilisateur (vue).
- **Contrôleur** : Le contrôleur capte cette interaction et la traite. Il peut demander au modèle de changer son état ou récupérer des données.
- **Modèle** : Si le modèle est modifié, il notifie la vue des changements.
- **Vue** : La vue se met à jour pour refléter les nouvelles données du modèle.