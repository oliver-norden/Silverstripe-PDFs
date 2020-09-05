# Silverstripe-PDFs
Rendering Silverstripe CMS data objects as PDFs
<br>
Tutorial: [Silverstripe PDFs](https://olivernorden.se/blog/silverstripe-pdfs)

## Set up project locally
1. Make sure you have Docker or Docker desktop for Mac/ Windows installed.
2. Download the project.
3. Run `docker-compose run --rm silverstripe composer install`
4. Run `docker-compose up -d`
5. Go to http://localhost:8080/ to access the Silverstripe application

Data objects for PDFs are created on http://localhost:8080/admin/my-data-objects/ and viewed on http://localhost:8080/pdf/<obj-id>. Default admin credentials are admin:password.
