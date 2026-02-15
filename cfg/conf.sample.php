<?php http_response_code(403); /*
# config file for PrivateBin
#
# An explanation of chaque paramètre est disponible en ligne : https://github.com/PrivateBin/PrivateBin/wiki/Configuration.

[main]
# (optionnel) nom du projet affiché sur le site
# name = "PrivateBin"

# URL complète (avec slash final) pointant vers PrivateBin, nécessaire pour les images Opengraph.
# basepath = "https://privatebin.example.com/"

; enable or disable the discussion feature, defaults to true
discussion = true

; preselect the discussion feature, defaults to false
opendiscussion = false

# Afficher ou non la date/heure dans les commentaires (par défaut : true)
# La date de création reste enregistrée pour le tri, même si non affichée.
# discussiondatedisplay = false

; enable or disable the password feature, defaults to true
password = true

; enable or disable the file upload feature, defaults to false
fileupload = false

; preselect the burn-after-reading feature, defaults to false
burnafterreadingselected = false

# Mode d'affichage préselectionné par défaut ("plaintext" par défaut)
# La valeur doit exister dans [formatter_options]
defaultformatter = "plaintext"

# (optionnel) thème de coloration syntaxique (voir css/prettify/)
# syntaxhighlightingtheme = "sons-of-obsidian"

; size limit per document or comment in bytes, defaults to 10 Megabytes
sizelimit = 10000000

# Par défaut, PrivateBin utilise le template "bootstrap5" (tpl/bootstrap5.php).
# Vous pouvez activer le menu de sélection de template (stocké en cookie de session).
templateselection = false

# Liste des templates disponibles si "templateselection" est activé
availabletemplates[] = "bootstrap5"
availabletemplates[] = "bootstrap"
availabletemplates[] = "bootstrap-page"
availabletemplates[] = "bootstrap-dark"
availabletemplates[] = "bootstrap-dark-page"
availabletemplates[] = "bootstrap-compact"
availabletemplates[] = "bootstrap-compact-page"

# Template par défaut de l'installation (voir tpl/), exemples : "bootstrap5", "bootstrap-dark", "bootstrap-compact"…
# Prévisualisations : https://privatebin.info/screenshots.html
# template = "bootstrap5"

# (optionnel) texte d'info à afficher (utiliser des guillemets simples pour les attributs HTML)
# info = "Plus d'informations sur la <a href='https://privatebin.info/'>page du projet</a>."

# (optionnel) message d'avertissement à afficher
# notice = "Note : Ceci est un service de test, les données peuvent être supprimées à tout moment."

# Par défaut, PrivateBin détecte la langue du visiteur via le navigateur.
# Vous pouvez activer le menu de sélection de langue (stocké en cookie de session).
languageselection = false

# Langue par défaut de l'installation (si le menu de langue est désactivé, ce sera la seule langue)
# languagedefault = "en"

# (optionnel) adresse du raccourcisseur d'URL proposé après création d'un document.
# À utiliser uniquement avec un service auto-hébergé (la clé de déchiffrement est dans l'URL).
# urlshortener = "https://shortener.example.com/api?link="

# (optionnel) Raccourcir l'URL automatiquement à la création d'un document (nécessite urlshortener)
# shortenbydefault = false

# (optionnel) Permettre la création d'un QR code pour partager l'URL du document
# qrcode = true

# (optionnel) Permettre l'envoi d'un email pour partager l'URL du document
# email = true

# (optionnel) Les icônes basées sur l'IP sont un mécanisme faible pour distinguer les auteurs de commentaires.
# Peut être : "none" / "identicon" / "jdenticon" (défaut) / "vizhash".
# icon = "none"

; Content Security Policy headers allow a website to restrict what sources are
; allowed to be accessed in its context. You need to change this if you added
; custom scripts from third-party domains to your templates, e.g. tracking
; scripts or run your site behind certain DDoS-protection services.
; Check the documentation at https://content-security-policy.com/
; Notes:
; - By default this disallows to load images from third-party servers, e.g. when
;   they are embedded in documents. If you wish to allow that, you can adjust the
;   policy here. See https://github.com/PrivateBin/PrivateBin/wiki/FAQ#why-does-not-it-load-embedded-images
;   for details.
; - The 'wasm-unsafe-eval' is used to enable webassembly support (used for zlib
;   compression). You can remove it if compression doesn't need to be supported.
; - The 'unsafe-inline' style-src is used by Chrome when displaying PDF previews
;   and can be omitted if attachment upload is disabled (which is the default).
;   See https://issues.chromium.org/issues/343754409
; - To allow displaying PDF previews in Firefox or Chrome, sandboxing must also
;   get turned off. The following CSP allows PDF previews:
; cspheader = "default-src 'none'; base-uri 'self'; form-action 'none'; manifest-src 'self'; connect-src * blob:; script-src 'self' 'wasm-unsafe-eval'; style-src 'self' 'unsafe-inline'; font-src 'self'; frame-ancestors 'none'; frame-src blob:; img-src 'self' data: blob:; media-src blob:; object-src blob:"
;
; The recommended and default used CSP is:
; cspheader = "default-src 'none'; base-uri 'self'; form-action 'none'; manifest-src 'self'; connect-src * blob:; script-src 'self' 'wasm-unsafe-eval'; style-src 'self'; font-src 'self'; frame-ancestors 'none'; frame-src blob:; img-src 'self' data: blob:; media-src blob:; object-src blob:; sandbox allow-same-origin allow-scripts allow-forms allow-modals allow-downloads"

; Enable or disable the warning message when the site is served over an insecure
; connection (insecure HTTP instead of HTTPS), defaults to true.
; Secure transport methods like Tor and I2P domains are automatically whitelisted.
; It is **strongly discouraged** to disable this.
; See https://github.com/PrivateBin/PrivateBin/wiki/FAQ#why-does-it-show-me-an-error-about-an-insecure-connection for more information.
; httpwarning = true

; Pick compression algorithm or disable it. Only applies to documents & comments
; created after changing the setting.
; Can be set to one these values: "none" / "zlib" (default).
; compression = "zlib"

[expire]
; expire value that is selected per default
; make sure the value exists in [expire_options]
default = "1week"

[expire_options]
; Set each one of these to the number of seconds in the expiration period,
; or 0 if it should never expire
5min = 300
10min = 600
1hour = 3600
1day = 86400
1week = 604800
; Well this is not *exactly* one month, it's 30 days:
1month = 2592000
1year = 31536000
never = 0

[formatter_options]
; Set available formatters, their order and their labels
plaintext = "Plain Text"
syntaxhighlighting = "Source Code"
markdown = "Markdown"

[traffic]
; time limit between calls from the same IP address in seconds
; Set this to 0 to disable rate limiting.
limit = 10

; (optional) Set IPs addresses (v4 or v6) or subnets (CIDR) which are exempted
; from the rate-limit. Invalid IPs will be ignored. If multiple values are to
; be exempted, the list needs to be comma separated. Leave unset to disable
; exemptions.
; exempted = "1.2.3.4,10.10.10/24"

; (optional) If you want only some source IP addresses (v4 or v6) or subnets
; (CIDR) to be allowed to create documents, set these here. Invalid IPs will be
; ignored. If multiple values are to be exempted, the list needs to be comma
; separated. Leave unset to allow anyone to create documents.
; creators = "1.2.3.4,10.10.10/24"

; (optional) if your website runs behind a reverse proxy or load balancer,
; set the HTTP header containing the visitors IP address, i.e. X_FORWARDED_FOR
; header = "X_FORWARDED_FOR"

[purge]
; minimum time limit between two purgings of expired documents, it is only
; checked when documents get created
; Set this to 0 to run a purge every time a document is created.
limit = 300

; maximum amount of expired documents to delete in one purge
; Set this to 0 to disable purging. Set it higher, if you are running a large
; site
batchsize = 10

[model]
; name of data model class to load and directory for storage
; the default model "Filesystem" stores everything in the filesystem
class = Filesystem
[model_options]
dir = PATH "data"

;[model]
; example of a Google Cloud Storage configuration
;class = GoogleCloudStorage
;[model_options]
;bucket = "my-private-bin"
;prefix = "pastes"
;uniformacl = false

;[model]
; example of DB configuration for MySQL
;class = Database
;[model_options]
;dsn = "mysql:host=localhost;dbname=privatebin;charset=UTF8"
;tbl = "privatebin_"	; table prefix
;usr = "privatebin"
;pwd = "Z3r0P4ss"
;opt[12] = true	  ; PDO::ATTR_PERSISTENT

;[model]
; example of DB configuration for SQLite
;class = Database
;[model_options]
;dsn = "sqlite:" PATH "data/db.sq3"
;usr = null
;pwd = null
;opt[12] = true	; PDO::ATTR_PERSISTENT

;[model]
; example of DB configuration for PostgreSQL
;class = Database
;[model_options]
;dsn = "pgsql:host=localhost;dbname=privatebin"
;tbl = "privatebin_"     ; table prefix
;usr = "privatebin"
;pwd = "Z3r0P4ss"
;opt[12] = true    ; PDO::ATTR_PERSISTENT

;[model]
; example of S3 configuration for Rados gateway / CEPH
;class = S3Storage
;[model_options]
;region = ""
;version = "2006-03-01"
;endpoint = "https://s3.my-ceph.invalid"
;use_path_style_endpoint = true
;bucket = "my-bucket"
;accesskey = "my-rados-user"
;secretkey = "my-rados-pass"

;[model]
; example of S3 configuration for AWS
;class = S3Storage
;[model_options]
;region = "eu-central-1"
;version = "latest"
;bucket = "my-bucket"
;accesskey = "access key id"
;secretkey = "secret access key"

;[model]
; example of S3 configuration for AWS using its SDK default credential provider chain
; if relying on environment variables, the AWS SDK will look for the following:
; - AWS_ACCESS_KEY_ID
; - AWS_SECRET_ACCESS_KEY
; - AWS_SESSION_TOKEN (if needed)
; for more details, see https://docs.aws.amazon.com/sdk-for-php/v3/developer-guide/guide_credentials.html#default-credential-chain
;class = S3Storage
;[model_options]
;region = "eu-central-1"
;version = "latest"
;bucket = "my-bucket"

;[shlink]
; - Shlink requires you to make a post call with a generated API key.
;   use this section to setup the API key and URL. In order to use this section,
;   "urlshortener" needs to point to the base URL of your PrivateBin
;   instance with "?shortenviashlink&link=" appended. For example:
;   urlshortener = "${basepath}?shortenviashlink&link="
;   This URL will in turn call Shlink on the server side, using the URL from
;   "apiurl" and the API Key from the "apikey" parameters below.
; apiurl = "https://shlink.example.com/rest/v3/short-urls"
; apikey = "your_api_key"

;[yourls]
; When using YOURLS as a "urlshortener" config item:
; - By default, "urlshortener" will point to the YOURLS API URL, with or without
;   credentials, and will be visible in public on the PrivateBin web page.
;   Only use this if you allow short URL creation without credentials.
; - Alternatively, using the parameters in this section ("signature" and
;   "apiurl"), "urlshortener" needs to point to the base URL of your PrivateBin
;   instance with "?shortenviayourls&link=" appended. For example:
;   urlshortener = "${basepath}?shortenviayourls&link="
;   This URL will in turn call YOURLS on the server side, using the URL from
;   "apiurl" and the "access signature" from the "signature" parameters below.

; (optional) the "signature" (access key) issued by YOURLS for the using account
; signature = ""
; (optional) the URL of the YOURLS API, called to shorten a PrivateBin URL
; apiurl = "https://yourls.example.com/yourls-api.php"

;[sri]
; Subresource integrity (SRI) hashes used in template files. Uncomment and set
; these for all js files used. See:
; https://github.com/PrivateBin/PrivateBin/wiki/FAQ#user-content-how-to-make-privatebin-work-when-i-have-changed-some-javascript-files
;js/privatebin.js = "sha512-[…]"
*/
