# Projet Microservices - Ingnum

Ce projet contient deux microservices :
- **RentalService** : Service de location développé en Spring Boot (Java)
- **PhpService** : Service de gestion des informations clients développé en PHP

## Architecture

Les deux services communiquent entre eux via un réseau Docker. Le RentalService peut appeler le PhpService pour récupérer des informations clients.

- **RentalService** : Accessible sur le port `8080`
- **PhpService** : Accessible sur le port `8081`

## Prérequis

- Docker
- Docker Compose
- Gradle (pour compiler le RentalService si nécessaire)

## Lancement des microservices

### Option 1 : Avec Docker Compose (Recommandé)

La méthode la plus simple pour lancer les deux services ensemble :

```bash
# Construire et démarrer les services
docker-compose up --build

# Ou en mode détaché (en arrière-plan)
docker-compose up --build -d
```

Pour arrêter les services :

```bash
docker-compose down
```

## Tester les services

### PhpService

```bash
curl "http://localhost:8081/index.php?name=Max"
```

Réponse attendue :
```json
{
  "customer": "Max",
  "address": "1 Rue de Paris, 75000 Paris"
}
```

![Test du PhpService](screen/Capture%20d'écran%202026-01-05%20151537.png)

### RentalService

```bash
curl http://localhost:8080/customer/Max
```

![Test du RentalService](screen/Capture%20d'écran%202026-01-05%20142514.png)

![Résultat des services](screen/Capture%20d'écran%202026-01-05%20142532.png)

![Résultat services](screen/Capture%20d'écran%202026-01-05%20142523.png)

## Structure du projet

```
.
├── docker-compose.yml          # Configuration Docker Compose
├── README.md                   # Ce fichier
├── PhpService/
│   ├── dockerfile             # Dockerfile du service PHP
│   └── index.php              # Code source PHP
└── RentalService/
    ├── dockerfile             # Dockerfile du service Spring Boot
    ├── build.gradle           # Configuration Gradle
    └── src/                   # Code source Java
```

