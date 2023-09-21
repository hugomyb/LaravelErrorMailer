<x-mail::message>
## Erreur :
# {{ $exception ? $exception->getMessage() : "" }}

## Fichier :
# {{ $exception ? $exception->getFile() : "" }}

## Ligne :
# {{ $exception ? $exception->getLine() : "" }}

## Trace :
# {{ $exception ? $exception->getTraceAsString() : "" }}
</x-mail::message>
