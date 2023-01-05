## INFO VERSION
    node v16.15.1
    composer v2.3.7
    npm v8.11.0
    php 8.1
## Info app
MedInv
es una aplicacion de control de inventario de medicamentos
con factura recipe y implementacion de diferentes roles

## INSTALL DEVELOP
    CLONAR GIT
    
    IR A RAIZ 
    EJECUTAR COMPOSER INSTALL
    NPM INSTALL

    CREAR .env EN LA RAIZ 
    DAR CREDENCIALES DE BASES DE DATOS A ENV
    CREAR Base de datos  EN SQL
    EJECUTAR para primera vez
        php artisan migrate  //para migrar la bd *si no esta migrada*
        php artisan db:seed
    
    Ejecucion del sistema en (consolas separadas)
        npm run dev
        php artisan serve


## INSTALL PRODUCTION

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Info Autores
Esta aplicacion fue desarrollada por 
Heyscar Romero
y siempre se debe retribuir el merito de este

esta es una aplicaciondonde solo se permite el uso gratuito al IVSS
si quiere ser usada para uso comercial debe comunicarse con el autor de esta


para que se envie la copia de seguridad al correo modificar el archivo 
MedInv/vendor/spatie/laravel-backup/src/Notifications/
cambiar funcion por esta 
  public function toMail(): MailMessage
    {
        // eliminamos el directorio de backups local para no dejar archivos innecesarios
        //Storage::disk("local")->deleteDirectory($this->applicationName());

        // obtenemos el último backup de S3
        $s3Backup = Storage::disk($this->diskName())->get($this->event->backupDestination->newestBackup()->path());

        // copiamos el backup de S3 a nuestro servidor para enviar por correo electrónico
        Storage::disk('local')->put($this->event->backupDestination->newestBackup()->path(), $s3Backup);

        // generamos la notificación adjuntando el backup del servidor
        $mailMessage = (new MailMessage())
            ->from(config('backup.notifications.mail.from.address', config('mail.from.address')), config('backup.notifications.mail.from.name', config('mail.from.name')))
            ->subject(trans('backup::notifications.backup_successful_subject', ['application_name' => $this->applicationName()]))
            ->line(trans('backup::notifications.backup_successful_body', ['application_name' => $this->applicationName(), 'disk_name' => $this->diskName()]))
            ->attach(Storage::disk("local")->path($this->event->backupDestination->newestBackup()->path()), [
                'as' => sprintf("%s.zip", now()->format("d-m-Y-H-i-s")),
                'mime' => 'application/zip',
            ]);

        $this->backupDestinationProperties()->each(function ($value, $name) use ($mailMessage) {
            $mailMessage->line("{$name}: $value");
        });

        return $mailMessage;
    }