@ -1,15 +0,0 @@
🚧 Under (heavy) construction. Please come back in a few nanoseconds. 🚧

# Registrability

Registrability is a tool for Data Protection Officers (DPO) to register their data processes following the GDPR.

  The Data Protection Officer (DPO) is required to keep a register of all the processing operations on personal data carried out by the Commission. The register, which must contain information explaining the purpose and conditions of all processing operations, is accessible to any interested person.

## How to install
- Clone the repo
- `cd src/` 
- exec `docker-compose up` ;
- `docker-compose exec php php artisan migrate:fresh --seed`

## Author
Martin Erpicum from [OpenJustice.be](https://openjustice.be)