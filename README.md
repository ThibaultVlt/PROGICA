# PROGICA - Plateforme de Gestion des Gîtes Campagnards

## 📄 Description

PROGICA est une plateforme interne destinée à recenser et faciliter la gestion des gîtes campagnards
proposés à la location. Ce projet a été initié par Madame Eva Khance, directrice de l'association
des propriétaires de gîtes campagnards (PROGICA).

L'objectif principal est de permettre aux propriétaires de gérer efficacement leurs biens et
d'offrir des outils de recherche performants aux utilisateurs internes. Dans cette version initiale,
les réservations se feront directement auprès des propriétaires, sans gestion intégrée des
réservations.

Le projet est une première étape visant à fournir un outil de gestion efficace pour les gîtes
campagnards. À terme, il pourrait évoluer pour inclure la gestion complète des réservations.

---

## 🛠️ Fonctionnalités Principales

### 🏡 Gestion des Gîtes

Chaque gîte dispose des informations suivantes :

- **Coordonnées du propriétaire**
- **Coordonnées de la personne à contacter** (nom, téléphone, email, horaires de disponibilité)
- **Caractéristiques du gîte** :
  - Localisation (région, département, ville)
  - Surface habitable
  - Nombre de chambres
  - Nombre de couchages
  - Équipements
  - Accueil des animaux (et tarif associé)
  - Tarifs de location hebdomadaire en fonction de la période de l'année
  - Services ou équipements payants (et coûts associés)

### 🔍 Recherche de Gîtes

La recherche de gîtes est possible via différents critères :

1. **Critères géographiques**

   - Région, département, ville
   - Recherche élargie à un rayon donné autour d'une ville (distance à vol d'oiseau)

2. **Critères d'équipement**

   - **Équipements intérieurs** : lave-vaisselle, lave-linge, climatisation, télévision
   - **Équipements extérieurs** : terrasse, barbecue, piscine (privée ou partagée), tennis,
     ping-pong

3. **Critères de services**
   - Location de linge
   - Ménage en fin de séjour
   - Accès internet

---

## 🔧 Prérequis Techniques

- **Langage de développement** : HTML, CSS, PHP
- **Framework ou librairie** : BOOTSTRAP, LARAVEL
- **Base de données** : MySQL

---

## 🚀 Installation et Déploiement

### 1. 🔒 Cloner le Dépôt

```bash
git clone https://github.com/votre-utilisateur/progica.git
cd progica
```

### 2. 🛠️ Installer les Dépendances

```bash
# Exemple avec Node.js
npm install
```

### 3. 📊 Configurer la Base de Données

Configurer les paramètres de la base de données dans le fichier de configuration (ex. : `.env` ou
`config.json`).

### 4. 🔄 Lancer l'Application

```bash
# Exemple avec Node.js
npm start
```

---

## 🌐 Structure du Projet

- `src/`
  - `models/` : Définitions des modèles de données (ex. : gîtes, utilisateurs).
  - `controllers/` : Gestion de la logique métier.
  - `routes/` : Définition des endpoints API.
  - `views/` : Fichiers front-end (si applicable).

---

## 📚 Contribution

Les contributions au projet sont les bienvenues ! Veuillez suivre les étapes suivantes :

1. Forker le projet.
2. Créer une branche pour votre fonctionnalité ou correctif :
   `git checkout -b feature/nouvelle-fonctionnalite`.
3. Soumettre une pull request.

---

## 👨‍🎓 Auteurs

**ThibaultVLT** - Développeur web

---

## 💡 Remarques

Ce projet est réalisé durant ma formation de Développeur web et web mobile.

TODO Trouver pour mettre les photos en base de données
TODO Faire le filtre de recherche pour la liste et les cards
