# docker-symfony

# Installation

First, clone this repository:

```bash
$ git clone git@github.com:TomBagiau/Docker-App_restaurant.git
```

Next, put your Symfony application into `symfony` folder and do not forget to add `symfony.localhost` in your `/etc/hosts` file.

Make sure you adjust `database_host` in `parameters.yml` to the database container alias "db" (for Symfony < 4)
Make sure you adjust `DATABASE_URL` in `env` to the database container alias "db" (for Symfony >= 4)

Then, run:

```bash
$ docker-compose up -d
```

---

if ERROR -> Case mismatch between loaded and declared class names: "App\Entity\produit" vs "App\Entity\Produit".
-> just refresh

Error while deleting restaurant but it works.



# Docker-App_Restaurant

