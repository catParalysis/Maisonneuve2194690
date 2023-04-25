# README Travail Pratique 2 Cadriciel LARAVEL

https://e2194690.webdev.cmaisonneuve.qc.ca/Maisonneuve2194690/


email: adelelauzon@example.net

password: pass1234



J'ai commencé par utiliser le dossier newProject suivi de PHP ARTISAN SERVE

- Commandes utilisés durant la création du projet
    - php artisan make:Model Ville -m   
    - php artisan make:Model Etudiant -m   
    - php artisan make:Controller EtudiantController -m Etudiant
    - php artisan migrate:fresh --seed (création des tables)

- Commandes utilisés durant la création des factory

    - php artisan make:factory VilleFactory --model=App\Models\Ville 
    - php artisan make:factory EtudiantFactory --model=App\Models\Etudiant

- php artisan tinker 

    - Ville::factory()->count(15)->create();
    - Etudiant::factory()->count(100)->create();
