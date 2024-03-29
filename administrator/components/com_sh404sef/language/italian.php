<?php
//
// Copyright (C) 2004 W.H.Welch
// All rights reserved.
//
// This source file is part of the 404SEF Component, a Mambo 4.5.1
// custom Component By W.H.Welch - http://sef404.sourceforge.net/
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// Please note that the GPL states that any headers in files and
// Copyright notices as well as credits in headers, source files
// and output (screens, prints, etc.) can not be removed.
// You can extend them with your own credits, though...
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
//
// The "GNU General Public License" (GPL) is available at
// http://www.gnu.org/copyleft/gpl.html.
//
// Additions by Yannick Gaultier (c) 2006-2010
// Italian Translation by Mac - http://www.simfly.it
//
// Dont allow direct linking
defined( '_JEXEC' ) or die( 'Un accesso diretto a questa locazione non  consentito.' );

define('COM_SH404SEF_404PAGE','Pagina 404');
define('COM_SH404SEF_ADD','Aggiungi');
define('COM_SH404SEF_ADDFILE','File index di default.');
define('COM_SH404SEF_ASC',' (asc) ');
define('COM_SH404SEF_BACK','Torna al pannello di controllo di sh404SEF');
define('COM_SH404SEF_BADURL','La vecchia URL non&ndash;SEF deve iniziare con index.php');
define('COM_SH404SEF_CHK_PERMS','Per favore, controlla i permessi del file e assicurati che questo file sia leggibile.');
define('COM_SH404SEF_CONFIG','Configurazione<br/> di sh404SEF');
define('COM_SH404SEF_CONFIG_DESC','Configura  tutte le funzionalit&agrave; di sh404SEF');
define('COM_SH404SEF_CONFIG_UPDATED','Configurazione aggiornata');
define('COM_SH404SEF_CONFIRM_ERASE_CACHE', 'Vuoi svuotare la cache URL? Questa azione &egrave; altamente raccomandabile dopo aver modificato la configurazione. Per generare una nuova cache dovresti ricaricare nuovamente la homepage, o meglio: generare una sitemap per il tuo sito.');
define('COM_SH404SEF_COPYRIGHT','Copyright');
define('COM_SH404SEF_DATEADD','Data aggiunta');
define('COM_SH404SEF_DEBUG_DATA_DUMP','DEBUG DATA DUMP COMPLETO: Caricamento pagina terminato');
define('COM_SH404SEF_DEF_404_MSG','<h1>Bad karma: we can\'t find that page!</h1>
<p>You asked for <strong>{%sh404SEF_404_URL%}</strong>, but despite our computers looking very hard, we could not find it. What happened ?</p>
<ul>
<li>the link you clicked to arrive here has a typo in it</li>
<li>or somehow we removed that page, or gave it another name</li>
<li>or, quite unlikely for sure, maybe you typed it yourself and there was a little mistake ?</li>
</ul>
<h4>{sh404sefSimilarUrlsCommentStart}It\'s not the end of everything though : you may be interested in the following pages on our site:{sh404sefSimilarUrlsCommentEnd}</h4>
<p>{sh404sefSimilarUrls}</p>
<p> </p>');
define('COM_SH404SEF_DEF_404_PAGE','<b>Pagina 404 standard</b><br>');
define('COM_SH404SEF_DESC',' (disc) ');
define('COM_SH404SEF_DISABLED',"<p class='error'>NOTA: Il supporto SEF in Joomla &egrave; attualmente disabilitato. Per usare SEF, attivalo da <a href='".$GLOBALS['shConfigLiveSite']."/administrator/index.php?option=com_config'>Configurazione Globale</a> pagina SEO.</p>");
define('COM_SH404SEF_EDIT','Modifica');
define('COM_SH404SEF_EMPTYURL','Devi inserire una URL, per il reindirizzamento.');
define('COM_SH404SEF_ENABLED','Attivato');
define('COM_SH404SEF_ERROR_IMPORT','Errore durante l&rsquo;importazione (caricamento) dei dati:');
define('COM_SH404SEF_EXPORT','Backup degli URL personalizzati');
define('COM_SH404SEF_EXPORT_FAILED','ESPORTAZIONE DEI DATI FALLITA!!!');
define('COM_SH404SEF_FATAL_ERROR_HEADERS','ERRORE CRITICO: HEADER GIA&rsquo; INVIATO');
define('COM_SH404SEF_FRIENDTRIM_CHAR','Trim friendly caratteri');
define('COM_SH404SEF_HELP','Supporto <br/>di sh404SEF');
define('COM_SH404SEF_HELPDESC','Serve aiuto con sh404SEF?');
define('COM_SH404SEF_HELPVIA','<b>L&rsquo;aiuto &egrave; disponibile nei seguenti forums:</b>');
define('COM_SH404SEF_HIDE_CAT','Nascondi la Categoria');
define('COM_SH404SEF_HITS','Viste');
define('COM_SH404SEF_IMPORT','Importa URL Personalizzati');
define('COM_SH404SEF_IMPORT_EXPORT','Importa/Esporta URL');
define('COM_SH404SEF_IMPORT_OK','Gli URL personalizzati sono stati importati con successo!');
define('COM_SH404SEF_INFO','Documentazione<br/>di sh404SEF');
define('COM_SH404SEF_INFODESC','Vedi Sommario e Documentazione del progetto sh404SEF');
define('COM_SH404SEF_INSTALLED_VERS','Versione installata:');
define('COM_SH404SEF_INVALID_SQL','DATI NON VALIDI NEL FILE SQL:');
define('COM_SH404SEF_INVALID_URL','URL NON VALIDA: questo link richiede un Item ID valido, ma non &egrave; stato trovato.<br/>SOLUZIONE: Crea un menu per questo articolo. Se non ce ne sono da pubblicare, basta crearlo.');
define('COM_SH404SEF_LICENSE','Licenza');
define('COM_SH404SEF_LOWER','Tutto minuscolo');
define('COM_SH404SEF_MAMBERS','Membri del Forum');
define('COM_SH404SEF_NEWURL','Vecchia URL Non-SEF');
define('COM_SH404SEF_NO_UNLINK','Impossibile rimuovere i files caricati dalla directory dei media');
define('COM_SH404SEF_NOACCESS','Impossibile accedere.');
define('COM_SH404SEF_NOCACHE','Non modificare');
define('COM_SH404SEF_NOLEADSLASH','La nuova SEF URL non deve avere la barra (slash) all&rsquo;inizio');
define('COM_SH404SEF_NOREAD','ERRORE CRITICO: impossibile leggere il file.');
define('COM_SH404SEF_NORECORDS','Nessun record trovato.');
define('COM_SH404SEF_OFFICIAL','Forum  del progetto ufficiale');
define('COM_SH404SEF_OK',' OK ');
define('COM_SH404SEF_OLDURL','Nuova URL SEF');
define('COM_SH404SEF_PAGEREP_CHAR','Carattere per la spaziatura pagine');
define('COM_SH404SEF_PAGETEXT','Testo della pagina');
define('COM_SH404SEF_PROCEED','Procedi');
define('COM_SH404SEF_PURGE404','Sfoltisci<br/>404 Logs');
define('COM_SH404SEF_PURGE404DESC','Sfoltisci 404 Logs');
define('COM_SH404SEF_PURGECUSTOM','Sfoltisci<br/>Reindirizzamenti personalizzati');
define('COM_SH404SEF_PURGECUSTOMDESC','Sfoltisci Reindirizzamenti personalizzati');
define('COM_SH404SEF_PURGEURL','Sfoltisci<br/>SEF Urls');
define('COM_SH404SEF_PURGEURLDESC','Sfoltisci SEF Urls');
define('COM_SH404SEF_REALURL','Url Reale');
define('COM_SH404SEF_RECORD','record');
define('COM_SH404SEF_RECORDS','records');
define('COM_SH404SEF_REPLACE_CHAR','Sostituzione carattere');
define('COM_SH404SEF_SAVEAS','Salva il reindirizzamento personalizzato');
define('COM_SH404SEF_SEFURL','Url SEF');
define('COM_SH404SEF_SELECT_DELETE','Seleziona un articolo da cancellare');
define('COM_SH404SEF_SELECT_FILE','Per favore, seleziona un file, prima.');
define('COM_SH404SEF_ACTIVATE_IJOOMLA_MAG', 'Attiva iJoomla magazine nel contenuto');
define('COM_SH404SEF_ADV_INSERT_ISO', 'Inserisci codice ISO');
define('COM_SH404SEF_ADV_MANAGE_URL', 'Elaborazione degli URL');
define('COM_SH404SEF_ADV_TRANSLATE_URL', 'Traduci URL');
define('COM_SH404SEF_ALWAYS_INSERT_ITEMID', 'Aggiungi sempre l&rsquo;ItemID all&rsquo;URL SEF');
define('COM_SH404SEF_ALWAYS_INSERT_ITEMID_PREFIX', 'menu id');
define('COM_SH404SEF_ALWAYS_INSERT_MENU_TITLE', 'Inserisci sempre il titolo di menu');
define('COM_SH404SEF_CACHE_TITLE', 'Gestione cache');
define('COM_SH404SEF_CAT_TABLE_SUFFIX', 'Tabella');
define('COM_SH404SEF_CB_INSERT_NAME', 'Inserisci il nome Community Builder');
define('COM_SH404SEF_CB_INSERT_USER_ID', 'Inserisci user ID');
define('COM_SH404SEF_CB_INSERT_USER_NAME', 'Inserisci user name');
define('COM_SH404SEF_CB_NAME', 'Nome Community Builder di default');
define('COM_SH404SEF_CB_TITLE', 'Configurazione Community Builder');
define('COM_SH404SEF_CB_USE_USER_PSEUDO', 'Inserisci uno pseudonimo utente');
define('COM_SH404SEF_CONF_TAB_ADVANCED', 'Avanzato');
define('COM_SH404SEF_CONF_TAB_BY_COMPONENT', 'Per componente');
define('COM_SH404SEF_CONF_TAB_MAIN', 'Principale');
define('COM_SH404SEF_CONF_TAB_PLUGINS', 'Plugins');
define('COM_SH404SEF_DEFAULT_MENU_ITEM_NAME', 'Titolo menu di default');
define('COM_SH404SEF_DO_NOT_INSERT_LANGUAGE_CODE','Non inserire codice.');
define('COM_SH404SEF_DO_NOT_OVERRIDE_SEF_EXT', 'Non sovrascrivere sef_ext');
define('COM_SH404SEF_DO_NOT_TRANSLATE_URL','Non tradurre');
define('COM_SH404SEF_ENCODE_URL', 'Codifica URL');
define('COM_SH404SEF_FB_INSERT_CATEGORY_ID', 'Inserisci ID categoria');
define('COM_SH404SEF_FB_INSERT_CATEGORY_NAME', 'Inserisci nome categoria');
define('COM_SH404SEF_FB_INSERT_MESSAGE_ID', 'Inserisci l&rsquo;ID del post');
define('COM_SH404SEF_FB_INSERT_MESSAGE_SUBJECT', 'Inserisci l&rsquo;oggetto del post');
define('COM_SH404SEF_FB_INSERT_NAME', 'Inserisci nome Kunena');
define('COM_SH404SEF_FB_NAME', 'Nome Kunena di default');
define('COM_SH404SEF_FB_TITLE', 'Configurazione Kunena');
define('COM_SH404SEF_FILTER', 'Filtro');
define('COM_SH404SEF_FORCE_NON_SEF_HTTPS', 'Forza non sef se HTTPS');
define('COM_SH404SEF_GUESS_HOMEPAGE_ITEMID', 'ItemID figurativo nella homepage');
define('COM_SH404SEF_IJOOMLA_MAG_NAME', 'Nome rivista di default');
define('COM_SH404SEF_IJOOMLA_MAG_TITLE', 'Configurazione iJoomla Magazine');
define('COM_SH404SEF_INSERT_GLOBAL_ITEMID_IF_NONE', 'Inserisci ItemID del menu se non c&rsquo;&egrave;');
define('COM_SH404SEF_INSERT_IJOOMLA_MAG_ARTICLE_ID', 'Inserisci ID articolo nell&rsquo;URL');
define('COM_SH404SEF_INSERT_IJOOMLA_MAG_ISSUE_ID', 'Inserisci ID della pubblicazione nell&rsquo;URL');
define('COM_SH404SEF_INSERT_IJOOMLA_MAG_MAGAZINE_ID', 'Inserisci ID rivista nell&rsquo;URL');
define('COM_SH404SEF_INSERT_IJOOMLA_MAG_NAME', 'Inserisci nome rivista nell&rsquo;URL');
define('COM_SH404SEF_INSERT_LANGUAGE_CODE', 'Inserisci codice lingua nell&rsquo;URL');
define('COM_SH404SEF_INSERT_NUMERICAL_ID', 'Inserisci ID numerica nell&rsquo;URL');
define('COM_SH404SEF_INSERT_NUMERICAL_ID_ALL_CAT', 'Tutte le categorie');
define('COM_SH404SEF_INSERT_NUMERICAL_ID_CAT_LIST', 'A quali categorie applicare');
define('COM_SH404SEF_INSERT_NUMERICAL_ID_TITLE', 'Unico ID');
define('COM_SH404SEF_INSERT_PRODUCT_ID', 'Inserisci ID del prodotto nell&rsquo;URL');
define('COM_SH404SEF_INSERT_TITLE_IF_NO_ITEMID', 'Inserisci titolo di menu se manca l&rsquo;ItemID');
define('COM_SH404SEF_ITEMID_TITLE', 'Gestione ItemID');
define('COM_SH404SEF_LETTERMAN_DEFAULT_ITEMID', 'ItemID di default per la pagina Letterman');
define('COM_SH404SEF_LETTERMAN_TITLE', 'Configurazione Letterman');
define('COM_SH404SEF_LIVE_SECURE_SITE', 'SSL secure URL');
define('COM_SH404SEF_LOG_404_ERRORS', 'registra errori 404');
define('COM_SH404SEF_MAX_URL_IN_CACHE', 'Spazio della cache');
define('COM_SH404SEF_OVERRIDE_SEF_EXT', 'Sovrascrivi file sef_ext');
define('COM_SH404SEF_REDIR_404', '404');
define('COM_SH404SEF_REDIR_CUSTOM', 'Personalizzato');
define('COM_SH404SEF_REDIR_SEF', 'SEF');
define('COM_SH404SEF_REDIR_TOTAL', 'Totale');
define('COM_SH404SEF_REDIRECT_JOOMLA_SEF_TO_SEF', '301 reindirizzamento da JOOMLA SEF a sh404SEF');
define('COM_SH404SEF_REDIRECT_NON_SEF_TO_SEF', '301 reindirizzamento da non-sef a sef URL');
define('COM_SH404SEF_REPLACEMENTS', 'Lista di caratteri di sostituzione');
define('COM_SH404SEF_SHOP_NAME', 'nome negozio di default');
define('COM_SH404SEF_TRANSLATE_URL', 'Traduci URL');
define('COM_SH404SEF_TRANSLATION_TITLE', 'Gestione Traduzioni');
define('COM_SH404SEF_USE_URL_CACHE', 'Attiva cache degli URL');
define('COM_SH404SEF_VM_ADDITIONAL_TEXT', 'Testo supplementare');
define('COM_SH404SEF_VM_DO_NOT_SHOW_CATEGORIES', 'Nessuna');
define('COM_SH404SEF_VM_INSERT_CATEGORIES', 'Inserisci categorie');
define('COM_SH404SEF_VM_INSERT_CATEGORY_ID', 'Inserisci ID categoria nell&rsquo;URL');
define('COM_SH404SEF_VM_INSERT_FLYPAGE', 'Inserisci nome flypage');
define('COM_SH404SEF_VM_INSERT_MANUFACTURER_ID', 'Inserisci ID del produttore');
define('COM_SH404SEF_VM_INSERT_MANUFACTURER_NAME', 'Inserisci il nome del produttore nell&rsquo;URL');
define('COM_SH404SEF_VM_INSERT_SHOP_NAME', 'Inserisci il nome del negozio nell&rsquo;URL');
define('COM_SH404SEF_VM_SHOW_ALL_CATEGORIES', 'Tutte le sottocategorie');
define('COM_SH404SEF_VM_SHOW_LAST_CATEGORY', 'Solo l&rsquo;ultima');
define('COM_SH404SEF_VM_TITLE', 'Configurazione VirtueMart');
define('COM_SH404SEF_VM_USE_PRODUCT_SKU', 'usa il codice prodotto (SKU) come nome');
define('COM_SH404SEF_SHOW_CAT', 'Includi categoria');
define('COM_SH404SEF_SHOW_SECT','Mostra sezione');
define('COM_SH404SEF_SHOW0','Mostra SEF Urls');
define('COM_SH404SEF_SHOW1','Mostra 404 Log');
define('COM_SH404SEF_SHOW2','Mostra Reindirizzamenti personalizzati');
define('COM_SH404SEF_SKIP','Salta');
define('COM_SH404SEF_SORTBY','Ordina per:');
define('COM_SH404SEF_STRANGE','Qualcosa di strano &egrave; successo. Questo non dovrebbe accadere<br />');
define('COM_SH404SEF_STRIP_CHAR','Strip caratteri');
define('COM_SH404SEF_SUCCESSPURGE','I records sono stati sfoltiti');
define('COM_SH404SEF_SUFFIX','Suffisso del file');
define('COM_SH404SEF_SUPPORT','Sito<br/>di supporto');
define('COM_SH404SEF_SUPPORT_404SEF','Supporto di 404SEF');
define('COM_SH404SEF_SUPPORTDESC','Apri il sito ufficiale di sh404SEF (in una nuova finestra)');
define('COM_SH404SEF_TITLE_ADV','Configurazione avanzata del componente');
define('COM_SH404SEF_TITLE_BASIC','Configurazione base');
define('COM_SH404SEF_TITLE_CONFIG',' Configurazione sh404SEF');
define('COM_SH404SEF_TITLE_MANAGER','404 SEF URL Manager');
define('COM_SH404SEF_TITLE_PURGE','Sfoltisci il database di 404 SEF');
define('COM_SH404SEF_TITLE_SUPPORT','Supporto 404 SEF');
define('COM_SH404SEF_TT_404PAGE','Pagina di contenuto statico da usare come pagina 404 Errore Non Trovato');
define('COM_SH404SEF_TT_ADDFILE','Nome file da inserire dopo un URL vuoto / quando non esistono files.  Utile per i bots che esaminano il tuo sito in cerca di un file specifico in una determinata locazione, ma si reinvia ad un 404 perch&eacute; non ne trovano.');
define('COM_SH404SEF_TT_ADV','<b>Gestione normale</b><br/>elabora normalmente, se &egrave; presente una estensione avanzata, sar&agrave; usata quella. <br/><b>Non modificare</b><br/>non memorizzare nel DB e crea le URL SEF nel vecchio stile<br/><b>Salta</b><br/>non usare le URL SEF per questo componente<br/>');
define('COM_SH404SEF_TT_ADV4','Opzioni avanzate per ');
define('COM_SH404SEF_TT_ENABLED','Se settata su No sar&agrave; usato il SEF di Joomla');
define('COM_SH404SEF_TT_FRIENDTRIM_CHAR','caratteri da tagliare intorno l&rsquo; URL, separa con |. Warning: if you change this from its default value, make sure to not leave it empty. At least use a space. Due to a small bug in Joomla, this cannot be left empty.');
define('COM_SH404SEF_TT_LOWER','Converte in minuscolo tutti i caratteri della URL','Tutto minuscolo');
define('COM_SH404SEF_TT_NEWURL','Questa URL deve iniziare con index.php');
define('COM_SH404SEF_TT_OLDURL','Solo reindirizzamenti relativi dalla root di Joomla <i>senza</i> la barra (slash) iniziale');
define('COM_SH404SEF_TT_PAGEREP_CHAR','Carattere da utilizzare per separare i numeri di pagina dal resto degli URL');
define('COM_SH404SEF_TT_PAGETEXT','Testo da aggiungere alla URL per pagine multiple. Usa %s per inserire un numero di pagina, per default sar&agrave; inserito alla fine. Se &egrave; definito un suffisso, sar&agrave; aggiunto alla fine della stringa.');
define('COM_SH404SEF_TT_REPLACE_CHAR','Carattere da usare per sostituire un carattere sconosciuto nella URL');
define('COM_SH404SEF_TT_ACTIVATE_IJOOMLA_MAG', 'Se selezionato su <strong>Yes</strong>, il parametro ed, se passato al componente com_content sar&agrave; interpretato come ID dell&rsquo; edizione iJoomla magazine.');
define('COM_SH404SEF_TT_ADV_INSERT_ISO', 'Per ogni componente installato, e se il tuo sito &egrave; multi&ndash;lingua, scegli se inserire o no il codice ISO del linguaggio target nella URL SEF. Per esempio: www.monsite.com/<b>fr</b>/introduction.html. fr sta per francese. Questo codice non sar&agrave; inserito nell&rsquo;URL di default del linguaggio.');
define('COM_SH404SEF_TT_ADV_MANAGE_URL', 'Per ogni componente installato:<br /><b>usa gestore di default</b><br/>elabora normalmente, se &egrave; presente una estensione SEF Advanced verr&agrave; utilizzata. <br/><b>no cache</b><br/>non immagazzinare nel DB e non creare URL SEF di vecchio tipo<br/><b>salta</b><br/>non scrivere SEF urls per questo componente<br/>');
define('COM_SH404SEF_TT_ADV_OVERRIDE_SEF', 'Alcuni componenti hanno i propri files sef_ext destinati ad essere usati con Joomla SEF, OpenSEF o SEF Advanced. Se questo parametro &egrave; attivo (sovrascrivi sef_ext), questa estensione di file non sar&agrave; utilizzata, e il proprio plugin sh404SEF sar&agrave; invece usato (premesso che ce ne sia uno per quel particolare componente). In caso contrario, sar&agrave; utilizzato il file sef_ext proprio del componente.');
define('COM_SH404SEF_TT_ADV_TRANSLATE_URL', 'Per ogni componente installato, seleziona se l&rsquo; URL deve essere tradotto. Non ha effetto se il sito &egrave; monolingua.');
define('COM_SH404SEF_TT_ALWAYS_INSERT_ITEMID', 'Se impostato su SI, l&rsquo;ItemID non-sef(o l&rsquo;attuale ItemID di menu se nessuna &egrave; impostata nell&rsquo;URL non-sef) sar&agrave; annessa alla SEF URL. Questo metodo dovrebbe essere usato invece di inserire Sempre il parametro del titolo di menu, se hai diverse voci di menu con lo stesso titolo (come, per esempio, uno nel top menu ed uno nel main menu)');
define('COM_SH404SEF_TT_ALWAYS_INSERT_MENU_TITLE', 'Se impostato su SI, il titolo di voce di menu corrispondente all&rsquo;ItemID impostato nell&rsquo;URL non-sef, o l&rsquo;attuale titolo della voce di menu se non &egrave; stato impostato nessun ItemID, sar&agrave; inserito nella SEF URL.');
define('COM_SH404SEF_TT_CB_INSERT_NAME', 'Se impostato su <strong>Si</strong>, il titolo dell&rsquo;elemento di menu che riporta alla pagina principale di Community Builder sar&agrave; esteso a tutti i CB SEF URL');
define('COM_SH404SEF_TT_CB_INSERT_USER_ID', 'Se impostato su<strong>Si</strong>, la user ID sar&agrave; estesa al suo nome <strong>la precedente opzione &egrave; anche impostata su SI</strong>, nel caso due users dovessero avere lo stesso nome.');
define('COM_SH404SEF_TT_CB_INSERT_USER_NAME', 'Se impostato su <strong>SI</strong>, lo user name sar&agrave; inserito nelle SEF URLs. <strong>ATTENZIONE</strong>: questo pu&ograve; portare ad un incremento sostanziale della grandezza del database, e pu&ograve; rallentare il sito, se hai molti utenti registrati. Se impostato su NO, lo user ID sar&agrave; invece utilizzato, con il regolare formato: ..../send-user-email.html?user=245');
define('COM_SH404SEF_TT_CB_NAME', 'Quando il parametro precedente &egrave; impostato su SI, puoi sovrascrivere il testo inserito nella SEF URL qui. Considera che questo testo rimarr&agrave; invariato, e non sar&agrave; tradotto su richiesta.');
define('COM_SH404SEF_TT_CB_USE_USER_PSEUDO', 'Se impostato su <strong>Si</strong>, lo pseudonimo dell&rsquo;user sar&agrave; inserito nella SEF URL, se hai attivato questa opzione sopra, invece del suo nome reale.');
define('COM_SH404SEF_TT_DEFAULT_MENU_ITEM_NAME', 'Quando il parametro qui sopra &egrave; impostato su SI, puoi sovrascrivere il testo inserito nella SEF URL qui. Considera che questo testo rimarr&agrave; invariato, e non sar&agrave; tradotto su richiesta.');
define('COM_SH404SEF_TT_ENCODE_URL', 'Se impostato su SI, l&rsquo;URL sar&agrave; codificato in modo da essere compatibile con linguaggi che hanno caratteri non latini. L&rsquo;URL apparir&agrave; tipo: mysite.com/%34%56%E8%67%12.....');
define('COM_SH404SEF_TT_FB_INSERT_CATEGORY_ID', 'Se impostato su<strong>Si</strong>, l&rsquo;ID della categoria sar&agrave; esteso con il suo nome<strong>la precedente opzione &egrave; anche impostata su SI</strong>, nel caso due categorie dovessero avere lo stesso nome.');
define('COM_SH404SEF_TT_FB_INSERT_CATEGORY_NAME', 'Se impostato su SI, il nome della categoria sar&agrave; inserito in tutti i link SEF a post o categorie');
define('COM_SH404SEF_TT_FB_INSERT_MESSAGE_ID', 'Se impostato su <strong>Si</strong>, ogni postID sar&agrave; estesa al suo oggetto<strong>la precedente opzione &egrave; anche impostata su SI</strong>, nel caso due post dovessero avere lo stesso nome.');
define('COM_SH404SEF_TT_FB_INSERT_MESSAGE_SUBJECT', 'Se impostato su <strong>Si</strong>, ogni argomento del post sar&agrave; inserito nella URL SEF che riporta a questo post');
define('COM_SH404SEF_TT_FB_INSERT_NAME', 'Se impostato su<strong> Si</strong>, il titolo dell&rsquo;elemento del menu che rimanda alla pagina principale di Kunena sar&agrave; esteso a tutte le SEF URL di Kunena');
define('COM_SH404SEF_TT_FB_NAME', 'Se impostato su<strong> Si<strong>, il nome Kunena (come definito dal titolo di elemento di menu di Kunena) sar&agrave; sempre esteso alla SEF URL.');
define('COM_SH404SEF_TT_FORCE_NON_SEF_HTTPS', 'Se impostato su SI, l&rsquo;URL sar&agrave; forzato a NON SEF dopo essere passato alla modalit&agrave; SSL (HTTPS). Questo permette operazioni con diversi server SSL condivisi che altrimenti potrebbero causare problemi.');
define('COM_SH404SEF_TT_GUESS_HOMEPAGE_ITEMID', 'Se impostato su SI, e solo la homepage, l&rsquo;ItemID degli URL com_content sar&agrave; rimosso e sostituito da quello che sh404SEF ha valutato. Questo &egrave; utile quando alcuni elementi dei contenuti possono essere visti nel frontpage(ad esempio nei blog), ed anche in altre pagine sul sito.');
define('COM_SH404SEF_TT_IJOOMLA_MAG_NAME', 'Quando il parametro precedente &egrave; impostato su SI, puoi sovrascrivere il testo inserito nella SEF URL qui. Considera che questo testo rimarr&agrave; invariato, e non sar&agrave; tradotto su richiesta.');
define('COM_SH404SEF_TT_INSERT_GLOBAL_ITEMID_IF_NONE', 'Se nessun Itemid &egrave; impostato come non-sef URL prima di essere impostato ad url SEF, e tu imposti questa opzione su VERO, l&rsquo;attuale ItemID dell&rsquo;elemento di menu sar&agrave; aggiunta ad esso. Questo assicura che , se cliccato, il link rimarr&agrave; nella stessa pagina (es: stessi moduli mostrati)');
define('COM_SH404SEF_TT_INSERT_IJOOMLA_MAG_ARTICLE_ID', 'Se impostato su <strong>Si</strong>, l&rsquo;ID dell&rsquo;articolo sar&agrave; esteso ad ogni titolo di articolo inserito in un URL, come in : <br /> miosito.com/Joomla-magazine/<strong>56</strong>-buon-titolo-di-articolo.html');
define('COM_SH404SEF_TT_INSERT_IJOOMLA_MAG_ISSUE_ID', 'Se impostato su <strong>Si</strong>, l&rsquo;ID unico interno di pubblicazione sar&agrave; esteso ad ogni nome di pubblicazione, per assicurare che sia unico.');
define('COM_SH404SEF_TT_INSERT_IJOOMLA_MAG_MAGAZINE_ID', 'Se impostato su <strong>Si</strong>, l&rsquo;ID rivista sar&agrave; esteso ad ogni nome di rivista inserito in un URL, come in : <br /> miosito.com/<strong>4</strong>-Joomla-magazine/bel-titolo-articolo.html');
define('COM_SH404SEF_TT_INSERT_IJOOMLA_MAG_NAME', 'Se impostato su <strong>SI<strong>, il nome della rivista (come definito dal titolo dell&rsquo;elemento di menu della rivista) sar&agrave; sempre esteso al SEF URL');
define('COM_SH404SEF_TT_INSERT_LANGUAGE_CODE', 'Se impostato su <strong>SI</strong>, il codice ISO del linguaggio della pagina sar&agrave; inserito nel SEF URL, a meno che la lingua sia quella di default del sito.');
define('COM_SH404SEF_TT_INSERT_NUMERICAL_ID', 'Se impostato su <strong>Si</strong>, un ID numerico sar&agrave; aggiunto all&rsquo;URL, in modo da facilitare l&rsquo;integrazione di servizi come Google news. L&rsquo; ID seguir&agrave; questo formato: 2007041100000, dove 20070411 &egrave; la data di creazione e 00000 &egrave; l&rsquo;ID unico interno dell&rsquo;elemento del contenuto. Dovresti impostare la data di creazione alla fine, quando i tuoi contenuti sono pronti per la pubblicazione. Per favore, fai attenzione a non cambiarla dopo.');
define('COM_SH404SEF_TT_INSERT_NUMERICAL_ID_CAT_LIST', 'Le id numeriche saranno inserite nei sef URL degli elementi dei contenuti trovati solo nelle categorie elencate qui. Puoi selezionare categorie multiple mantenendo premuto il tasto CTRL prima di cliccare sui nomi delle categorie.');
define('COM_SH404SEF_TT_INSERT_PRODUCT_ID', 'Se impostato su SI, la ID del prodotto sar&agrave; estesa al nome del prodotto nel SEF URL<br />Per esempio: miosito.com/3-mio-super-bellissimo-prodotto.html.<br />Questo &egrave; utile se non inserisci tutti i nomi delle categorie nell&rsquo; URL, poich&eacute; diversi prodotti possono avere lo stesso nome, in diverse categorie. Ricorda che questo non &egrave; il codice SKU del prodotto, ma soltanto il productID interno, che &egrave; sempre unico.');
define('COM_SH404SEF_TT_INSERT_TITLE_IF_NO_ITEMID', 'Se nessun Itemid &egrave; stato impostato nel non-sef URL prima di essere cambiato in uno di tipo SEF, e tu imposti questa opzione su VERO, l&rsquo;attuale titolo dell&rsquo;elemento di menu sar&agrave; inserito nel SEF URL. Questo dovrebbe essere impostato su VERO se anche il parametro sopra &egrave; impostato su VERO, in modo da prevenire che -2, -3, -ecc... siano aggiunti al SEF URL se un articolo &egrave; visto da differenti posizioni');
define('COM_SH404SEF_TT_LETTERMAN_DEFAULT_ITEMID', 'Inserisci Itemid della pagina da essere inserito nei link di Letterman (disiscrivi, messaggi di conferma, ...');
define('COM_SH404SEF_TT_LIVE_SECURE_SITE', 'Imposta questo su <strong>intero URL di base del tuo sito quando &egrave; in modalit&agrave; SSL</strong>.<br />Richiesto solo se usi un accesso https. Se non impostato, sar&agrave; impostato di default su httpS://URLnormaledelsito.<br />Per favore, inserisci l&rsquo; indirizzo URL per intero, senza nessuna slash finale. Esempio : <strong>https://www.mysite.com</strong> o <strong>https://sharedsslserveur.com/myaccount</strong>.');
define('COM_SH404SEF_TT_LOG_404_ERRORS', 'Se impostato su <strong>Si</strong>, gli errori 404 verranno registrati nel database. Questo ti pu&ograve; aiutare a trovare errori all&rsquo;interno dei link del tuo sito. Pu&ograve; anche utilizzare spazio del database non necessario, cos&igrave; puoi eventualmente disabilitarlo quando il tuo sito &egrave; stato ben controllato e testato.');
define('COM_SH404SEF_TT_MAX_URL_IN_CACHE', 'Quando la cache URL &egrave; attivata, questo parametro imposta la sua massima grandezza. Inserisci il numero massimo di  URL che possono essere immagazzinati nella cache (ulteriori URL saranno processati, ma non immagazzinati in cache, ma in questo modo il tempo di caricamento sar&agrave; maggiore). In pratica, ogni URL ha un peso di circa 200 bytes (100 per il SEF URL e 100 per il non-sef URL). Cos&igrave;, per esempio,  5000 URL utilizzeranno circa 1 Mb di memoria.');
define('COM_SH404SEF_TT_REDIRECT_JOOMLA_SEF_TO_SEF', 'Se impostato su <strong>Si</strong>, i SEF URL standard di JOOMLA saranno reindirizzati con un 301 al loro equivalente sh404SEF, se ce ne sono. Se non esistono, saranno creati al volo, a meno che non esistano POST data, nel cui caso non accadr&agrave; niente. Warning: this feature will work in most cases, but may give bad redirects for some Joomla SEF URL. Leave off if possible.');
define('COM_SH404SEF_TT_REDIRECT_NON_SEF_TO_SEF', 'Se impostato su <strong>Yes</strong>, i non-sef URL gi&agrave; esistenti nel DB saranno reindirizzati al loro omologo SEF, utilizzando un 301 - Reindirizzamento spostato permanentemente.');
define('COM_SH404SEF_TT_REPLACEMENTS', 'Caratteri non accettati nell&rsquo; URL, come ad esempio non-latini o accentati, possono essere sostituiti come dalla presente tabella di sostituzione. <br />Il formato &egrave; xxx | yyy per ogni controllo di sostituzione. xxx &egrave; il carattere da sostituire, ed yyy &egrave; il nuovo carattere. <br />Possono esserci diversi controlli di questo tipo, separati da virgole (,). Tra il vecchio carattere e quello nuovo, utilizza il carattere | . <br />Considera anche che xxx o yyy possono essere caratteri multipli, come ad esempio in |oe ');
define('COM_SH404SEF_TT_SHOP_NAME', 'Quando il parametro sopra &egrave; impostato su SI, puoi sovrascrivere il testo inserito nel SEF URL qui. Considera che questo testo rimarr&agrave; invariato e non sar&agrave; tradotto su richiesta.');
define('COM_SH404SEF_TT_TRANSLATE_URL', 'Se attivato, ed il sito &egrave; multi-lingue, gli elementi SEF URL saranno tradotti nel liinguaggio del visitatore, come deciso da Joomfish. Se disattivato, gli URL saranno sempre nel linguaggio di default del sito. Non &egrave; utilizzato se il sito non &egrave; multi-lingua.');
define('COM_SH404SEF_TT_USE_URL_CACHE', 'Se attivato, il SEF URL sar&agrave; scritto nella cache in-memoria, che aumenter&agrave; abbastanza il tempo di caricamento della pagina. Questo, comunque occuper&agrave; memoria!');
define('COM_SH404SEF_TT_VM_ADDITIONAL_TEXT', 'Se impostato su <strong>SI</strong>, sar&agrave; aggiunto un testo addizionale per navigare gli URL delle categorie. Per esempio: ..../categoria-A/guarda-tutti-i-prodotti.html invece di ..../categoria-A/ .');
define('COM_SH404SEF_TT_VM_INSERT_CATEGORIES', 'Se impostato su <strong>Nessuno</strong>, nessun nome di categoria sar&agrave; inserito nell&rsquo; URL che riporta alla visione di un prodotto, come in : <br /> mysite.com/joomla-cms.html<br />Se impostato su <strong>Solo l&rsquo;ultimo</strong>, il nome della categoria alla quale appartiene il prodotto sar&agrave; inserito nel SEF URL, come in : <br /> mysite.com/joomla/joomla-cms.html<br />Se impostato su <strong>Tutte le sottocategorie</strong>, saranno aggiunti i nomi di tutte le categorie alle quali i prodotti appartengono, come in : <br /> mysite.com/software/cms/joomla/joomla-cms.html');
define('COM_SH404SEF_TT_VM_INSERT_CATEGORY_ID', 'Se impostato su SI, l&rsquo; ID categoria sar&agrave; esteso ad ogni nome di categoria inserito in un URL che indirizza ad un prodotto, come in : <br /> mysite.com/1-software/4-cms/1-joomla/joomla-cms.html');
define('COM_SH404SEF_TT_VM_INSERT_FLYPAGE', 'Se impostato su SI, il nome della flypage sar&agrave; inserito nell&rsquo;URL che reinvia ai dettagli di un prodotto. Pu&ograve; essere attivato se usi solo una flypage.');
define('COM_SH404SEF_TT_VM_INSERT_MANUFACTURER_ID', 'Se impostato su SI, la ID del produttore sar&agrave; estesa al nome del produttore nel SEF URL<br />Per esempio : mysite.com/6-nome-produttore/3-il-mio-bel-prodotto.html.');
define('COM_SH404SEF_TT_VM_INSERT_MANUFACTURER_NAME', 'Se impostato su SI, il nome del produttore, se presente, sar&agrave; inserito nel SEF URL che reindirizza ad un prodotto.<br />Per esempio : mysite.com/nome-produttore/nome-prodotto.html');
define('COM_SH404SEF_TT_VM_INSERT_SHOP_NAME', 'Se impostato su SI, il nome negozio (come definito dal titolo dell&rsquo; elemento di menu) sar&agrave; sempre esteso alla SEF URL');
define('COM_SH404SEF_TT_VM_USE_PRODUCT_SKU', 'Se impostato su SI, lo SKU del prodotto, ovvero il codice che inserisci per ogni prodotto, sar&agrave; usato invece del nome completo del prodotto.');
define('COM_SH404SEF_TT_SHOW_CAT','Setta SI per includere il nome della categoria nella URL');
define('COM_SH404SEF_TT_SHOW_SECT','Setta SI per includere il nome della sezione nella URL');
define('COM_SH404SEF_TT_STRIP_CHAR','caratteri da tagliare intorno l&rsquo; URL, separa con |');
define('COM_SH404SEF_TT_SUFFIX','Estensione da usare per \'files\'. Lascia in bianco  per disabilitare. Una scelta comune sarebbe \'html\'.');
define('COM_SH404SEF_TT_USE_ALIAS','Setta su SI per usare alias del titolo al posto del titolo nella URL');
define('COM_SH404SEF_UNWRITEABLE',' <b><font color="red">Non scrivibile</font></b>');
define('COM_SH404SEF_UPLOAD_OK','Il file &egrave; stato caricato correttamente');
define('COM_SH404SEF_URL','Url');
define('COM_SH404SEF_URLEXIST','Questa URL &egrave; gi&agrave; esistente nel database!');
define('COM_SH404SEF_USE_ALIAS','Usa Alias del Titolo');
define('COM_SH404SEF_USE_DEFAULT','(Gestione normale)');
define('COM_SH404SEF_USING_DEFAULT',' <b><font color="red">Usa i valori predefiniti</font></b>');
define('COM_SH404SEF_VIEW404','Vedi/Modifica<br/>404 Logs');
define('COM_SH404SEF_VIEW404DESC','Vedi/Modifica 404 Logs');
define('COM_SH404SEF_VIEWCUSTOM','Vedi/Modifica<br/>Reindirizzamenti personalizzati');
define('COM_SH404SEF_VIEWCUSTOMDESC','Vedi/Modifica Reindirizzamenti personalizzati');
define('COM_SH404SEF_VIEWMODE','Modo vista:');
define('COM_SH404SEF_VIEWURL','Vedi/Modifica<br/>SEF Urls');
define('COM_SH404SEF_VIEWURLDESC','Vedi/Modifica SEF Urls');
define('COM_SH404SEF_WARNDELETE','ATTENZIONE!!! stai per  cancellare ');
define('COM_SH404SEF_WRITE_ERROR','Errore scrivendo la configurazione');
define('COM_SH404SEF_WRITE_FAILED','Impossibile scrivere i files caricati nella media directory');
define('COM_SH404SEF_WRITEABLE',' <b><font color="green">Scrivibile</font></b>');

// V 1.2.4.s
define('COM_SH404SEF_DOCMAN_TITLE', 'Configurazione DOCMan');
define('COM_SH404SEF_DOCMAN_INSERT_NAME', 'Inserisci nome DOCMan');
define('COM_SH404SEF_TT_DOCMAN_INSERT_NAME', 'Se impostato su <strong>SI</strong>, il titolo dell&rsquo;elemento di menu che rimanda alla pagina principale di DOCMan sar&agrave; esteso a tutti i SEF URL di DOCMan');
define('COM_SH404SEF_DOCMAN_NAME', 'Nome DOCMan di default');
define('COM_SH404SEF_TT_DOCMAN_NAME', 'Quando il parametro precedente &egrave; selezionato su SI, puoi sovrascrivere il testo inserito nella URL SEF qui. Considera che questo testo rimarr&agrave; invariato e non sar&agrave; tradotto su richiesta.');
define('COM_SH404SEF_DOCMAN_INSERT_DOC_ID', 'Inserisci ID documento');
define('COM_SH404SEF_TT_DOCMAN_INSERT_DOC_ID', 'Se impostato su <strong>SI</strong>, la ID del documento sar&agrave; estesa ad un nome di documento, che &egrave; necessario in caso diversi documenti abbiano nomi identici.');
define('COM_SH404SEF_DOCMAN_INSERT_DOC_NAME', 'Inserisci nome documento');
define('COM_SH404SEF_TT_DOCMAN_INSERT_DOC_NAME', 'Se impostato su <strong>SI</strong>, un nome documento sar&agrave; inserito in tutti i SEF URL che rimandano ad un&rsquo; azione su questo documento.');
define('COM_SH404SEF_MYBLOG_TITLE', 'Configurazione MyBlog');
define('COM_SH404SEF_MYBLOG_INSERT_NAME', 'Inserisci nome MyBlog');
define('COM_SH404SEF_TT_MYBLOG_INSERT_NAME', 'Se impostato su <strong>SI</strong>, il titolo dell&rsquo; elemento di menu che rimanda alla pagina principale di MyBlog sar&agrave; esteso a tutti i SEF URL MyBlog');
define('COM_SH404SEF_MYBLOG_NAME', 'Nome Myblog di default');
define('COM_SH404SEF_TT_MYBLOG_NAME', 'Quando il parametro precedente &egrave; impostato su SI, puoi sovrascrivere il testo inserito nella SEF URL qui. Considera che questo testo rimarr&agrave; invariato, e non sar&agrave; tradotto su richiesta.');
define('COM_SH404SEF_MYBLOG_INSERT_POST_ID', 'Inserisci post ID');
define('COM_SH404SEF_TT_MYBLOG_INSERT_POST_ID', 'Se impostato su<strong>SI</strong>, i post ID interni saranno estesi ai titoli dei post, che sono necessari in caso che diversi post dovessero avere titoli identici.');
define('COM_SH404SEF_MYBLOG_INSERT_TAG_ID', 'Inserisci ID tag');
define('COM_SH404SEF_TT_MYBLOG_INSERT_TAG_ID', 'Se impostato su <strong>Si</strong>, i tag ID interni saranno estesi ai nomi dei tag, che &egrave; necessario nel caso in cui diversi tag fossero identici, o in caso di interferenza con altri nomi di categorie.');
define('COM_SH404SEF_MYBLOG_INSERT_BLOGGER_ID', 'Inserisci ID blogger');
define('COM_SH404SEF_TT_MYBLOG_INSERT_BLOGGER_ID', 'Se impostato su <strong>Si</strong>, la blogger ID interna sar&agrave; estesa al nome del blogger, che &egrave; necessaria nel caso che diversi bloggers abbiano lo stesso nome.');
define('COM_SH404SEF_RW_MODE_NORMAL', 'Con .htaccess (mod_rewrite)');
define('COM_SH404SEF_RW_MODE_INDEXPHP', 'senza .htaccess (index.php)');
define('COM_SH404SEF_RW_MODE_INDEXPHP2', 'senza .htaccess (index.php?)');
define('COM_SH404SEF_SELECT_REWRITE_MODE', 'modalit&agrave; rescrivibile');
define('COM_SH404SEF_TT_SELECT_REWRITE_MODE', 'seleziona la modalit&agrave; rescrivibile per sh404SEF.<br /><strong>con .htaccess (mod_rewrite)</strong><br />Default mode : you must have a .htacces file, properly configured to match your server configuration<br /><strong>without .htaccess (index.php)</strong><br /><strong>EXPERIMENTAL :</strong>You don`t need a .htaccess file. This mode uses the PathInfo function of Apache servers. URLs will have an added /index.php/ bit at the beginning. It is not impossible that IIS servers also accept these URLS<br /><strong>without .htaccess (index.php?)</strong><br /><strong>EXPERIMENTAL :</strong>You don`t need a .htaccess file. This mode is identical to the previous one, except for the fact that /index.php?/ is used instead of /index.php/. Again, IIS servers may accept these URLs<br />');
define('COM_SH404SEF_RECORD_DUPLICATES', 'Registra URL duplicati');
define('COM_SH404SEF_TT_RECORD_DUPLICATES', 'Se impostato su<strong>Si</strong>, sh404SEF registrer&agrave; nel DB tutti gli URL non SEF che restituiscono lo stesso SEF url. Questo ti permetter&agrave; di scegliere quale preferisci, utilizzando la funzione Manage Duplicates nella lista SEF URL.');
define('COM_SH404SEF_META_TITLE', 'tag Titolo');
define('COM_SH404SEF_TT_META_TITLE', 'Immetti il testo da inserire nel tag <strong>META Title</strong> per l&rsquo;URL attualmente selezionato.');
define('COM_SH404SEF_META_DESC', 'tag Descrizione');
define('COM_SH404SEF_TT_META_DESC', 'Immetti il testo da inserire nel tag <strong>META Description</strong> per l&rsquo;URL attualmente selezionato.');
define('COM_SH404SEF_META_KEYWORDS', 'tag Keywords');
define('COM_SH404SEF_TT_META_KEYWORDS', 'Immetti il testo da inserire nel tag <strong>META keywords</strong> per l&rsquo;URL attualmente selezionato. Ogni parola o gruppo di parole deve essere separato da virgole.');
define('COM_SH404SEF_META_ROBOTS', 'Tag Robots');
define('COM_SH404SEF_TT_META_ROBOTS', 'Immetti il testo da inserire nel tag <strong>META Robots</strong> per l&rsquo;URL attualmente selezionato. Questo tag indica ai motori di ricerca se devono seguire i link sulla pagina corrente, e cosa devono fare con il contenuto della pagina stessa. Valori comuni:<br /><strong>INDEX,FOLLOW</strong> : indicizza il contenuto della pagina corrente, e segui tutti i link trovati nella pagina<br /><strong>INDEX,NO FOLLOW</strong> : indicizza il contenuto della pagina corrente, ma non seguire i link trovati all&rsquo; interno della pagina<br /><strong>NO INDEX, NO FOLLOW</strong> : non indicizzare il contenuto della pagina corrente, e non seguire i link trovati all&rsquo; interno della pagina<br />');
define('COM_SH404SEF_META_LANG', 'Tag Linguaggio');
define('COM_SH404SEF_TT_META_LANG', 'Immetti il testo da inserire nel tag <strong>META http-equiv= Content-Language </strong> per l&rsquo;URL attualmente selezionato. ');
define('COM_SH404SEF_CONF_TAB_META', 'Meta/SEO');
define('COM_SH404SEF_CONF_META_DOC', 'sh404SEF ha numerosi plugins per creare META tags per diversi componenti<strong>automaticamente</strong>. Non li creare manualmente fino a che quelli creati automaticamente non ti soddisfino!!<br>');
define('COM_SH404SEF_REMOVE_JOOMLA_GENERATOR', 'Rimuovi Joomla Generator tag');
define('COM_SH404SEF_TT_REMOVE_JOOMLA_GENERATOR', 'Se impostato su <strong>Si</strong>, il Generator = Joomla meta tag sar&agrave; rimosso da ogni pagina');
define('COM_SH404SEF_PUT_H1_TAG', 'Inserisci tags h1');
define('COM_SH404SEF_TT_PUT_H1_TAG', 'Se impostato su <strong>Si</strong>, i regolari titoli di contenuti saranno disposti all&rsquo; interno di tags h1. Questi titoli sono normalmente disposti da Joomla in una classe CSS il cui nome comincia con<strong>contentheading</strong>.');
define('COM_SH404SEF_META_MANAGEMENT_ACTIVATED', 'Attiva gestione Meta');
define('COM_SH404SEF_TT_META_MANAGEMENT_ACTIVATED', 'Se impostato su <strong>SI</strong>, Titolo, Descrizione, Keywords, Robots e Lingue, i META tags saranno gestiti da sh404SEF. Altrimenti, i valori originali prodotti da Joomla e/o altri componenti rimarranno invariati');
define('COM_SH404SEF_TITLE_META_MANAGEMENT', 'Gestione Meta tags');
define('COM_SH404SEF_META_EDIT', 'Modifica tags');
define('COM_SH404SEF_META_ADD', 'Aggiungi tags');
define('COM_SH404SEF_META_TAGS', 'META tags');
define('COM_SH404SEF_META_TAGS_DESC', 'Crea/modifica Meta tags');
define('COM_SH404SEF_PURGE_META_DESC', 'Cancella meta tags');
define('COM_SH404SEF_PURGE_META', 'Cancella META');
define('COM_SH404SEF_IMPORT_EXPORT_META', 'Importa/ esporta META');
define('COM_SH404SEF_NEW_META', 'Nuovo META');
define('COM_SH404SEF_NEWURL_META', 'Non SEF url');
define('COM_SH404SEF_TT_NEWURL_META', 'Inserisci la URL non SEFper la quale desideri impostare i Meta tags. ATTENZIONE: deve cominciare con <strong>index.php</strong>!');
define('COM_SH404SEF_BAD_META', 'Perfavore controlla i tuoi dati: degli input non sono validi.');
define('COM_SH404SEF_META_TITLE_PURGE', 'Cancella Meta tags');
define('COM_SH404SEF_META_SUCCESS_PURGE', 'Meta tags cancellati');
define('COM_SH404SEF_IMPORT_META', 'Importa Meta tags');
define('COM_SH404SEF_EXPORT_META', 'Esporta Meta tags');
define('COM_SH404SEF_IMPORT_META_OK', 'Meta tags importati con successo');
define('COM_SH404SEF_SELECT_ONE_URL', 'Perfavore, seleziona un (e solo uno) URL.');
define('COM_SH404SEF_MANAGE_DUPLICATES', 'gestione URL per: ');
define('COM_SH404SEF_MANAGE_DUPLICATES_RANK', 'Rank');
define('COM_SH404SEF_MANAGE_DUPLICATES_BUTTON', 'Duplica URL');
define('COM_SH404SEF_MANAGE_MAKE_MAIN_URL', 'URL principale');
define('COM_SH404SEF_BAD_DUPLICATES_DATA', 'Errore: dati URL non validi');
define('COM_SH404SEF_BAD_DUPLICATES_NOTHING_TO_DO', 'Questo URL &egrave; gi&agrave; l&rsquo;URL principale');
define('COM_SH404SEF_MAKE_MAIN_URL_OK', 'Operazione completata con successo');
define('COM_SH404SEF_MAKE_MAIN_URL_ERROR', 'C&rsquo;&egrave; stato un errore, operazione fallita');
define('COM_SH404SEF_CONTENT_TITLE', 'Configurazione dei contenuti');
define('COM_SH404SEF_INSERT_CONTENT_TABLE_NAME', 'Inserisci nome della tabella dei contenuti');
define('COM_SH404SEF_TT_INSERT_CONTENT_TABLE_NAME', 'Se selezionato su <strong>Si</strong>, il titolo dell&rsquo;elemento di menu che rimanda ad una tabella degli articoli (categoria o sezione) sar&agrave; esteso alla sua SEF URL. Questo permette di separare la visualizzazione delle tabelle dalla visualizzazione blog.');
define('COM_SH404SEF_CONTENT_TABLE_NAME', 'Tabella nomi link di default');
define('COM_SH404SEF_TT_CONTENT_TABLE_NAME', 'Quando il parametro precedente &egrave; selezionato su SI, puoi sovrascrivere il testo inserito nella URL SEF qui. Considera che questo testo rimarr&agrave; invariato e non sar&agrave; tradotto su richiesta.');
define('COM_SH404SEF_REDIRECT_WWW', '301 reindirizzamento www/non-www');
define('COM_SH404SEF_TT_REDIRECT_WWW', 'Se selezionato su SI, sh404SEF effettuer&agrave; un reindirizzamento a 301 se il sito viene raggiunto senza www, se la URL del sito inizia con www, o il sito &egrave; raggiunto con www iniziale quando l&rsquo;URL principale non ha www. Previene penalizzazioni per il contenuto duplicato, e diversi problemi che dipendono dalla tua configurazione Apache del server, oltre ai problemi con Joomla (WYSYWIG editors)');
define('COM_SH404SEF_INSERT_PRODUCT_NAME', 'Inserisci nome prodotto');
define('COM_SH404SEF_TT_INSERT_PRODUCT_NAME', 'Se selezionato su SI, il nome del prodotto sar&agrave; inserito nell&rsquo;URL');
define('COM_SH404SEF_VM_USE_PRODUCT_SKU_124S', 'Inserisci codice prodotto');
define('COM_SH404SEF_TT_VM_USE_PRODUCT_SKU_124S', 'Se selezionato su SI, il codice del prodotto (chiamato SKU in VirtueMart) sar&agrave; inserito nell&rsquo;URL.');

// V 1.2.4.t
define('COM_SH404SEF_DOCMAN_INSERT_CAT_ID', 'Inserisci ID categoria');
define('COM_SH404SEF_TT_DOCMAN_INSERT_CAT_ID', 'Se impostato su <strong>Si</strong>, l&rsquo;ID categoria sar&agrave; rimandato al suo nome<strong>se anche l&rsquo;opzione precedente &egrave; stata settata su Si</strong>, in caso due categorie dovessero avere lo stesso nome.');
define('COM_SH404SEF_DOCMAN_INSERT_CATEGORIES', 'Inserisci nome categoria');
define('COM_SH404SEF_TT_DOCMAN_INSERT_CATEGORIES', 'Se impostato su <strong>Nessuno</strong>, nessun nome di categoria sar&agrave; inserito in URL, come in : <br /> mysite.com/joomla-cms.html<br />Se impostato su <strong>Solo l&rsquo;ultimo</strong>, il nome di categoria sar&agrave; inserito nella SEF URL, come in : <br /> mysite.com/joomla/joomla-cms.html<br />Se impostato su <strong>Tutte categorie correlate</strong>, saranno aggiunti i nomi di tutte le categorie, come in : <br /> mysite.com/software/cms/joomla/joomla-cms.html');
define('COM_SH404SEF_FORCED_HOMEPAGE', 'URL della Home page');
define('COM_SH404SEF_TT_FORCED_HOMEPAGE', 'Qui non puoi inserire forzatamente un URL per la home page. Utile se hai impostato una `splash page`, solitamente un file index.html, che viene mostrato quando navighi l&rsquo;indirizzo http://www.mysite.com. Se &egrave; cos&igrave;, scrivi il seguente URL: http://www.mysite.com/index.php (senza aggiungere / alla fine), in modo che il sito Joomla venga mostrato quando il link alla Home del menu principale o pathway viene cliccato');
define('COM_SH404SEF_INSERT_CONTENT_BLOG_NAME', 'Inserisci nome di blog view');
define('COM_SH404SEF_TT_INSERT_CONTENT_BLOG_NAME', 'Se impostato su <strong>Si</strong>, il titolo dell&rsquo;elemento di menu che riconduce a un blog di articoli (categoria o sezione) sar&agrave; rimandato alla sua SEF URL. Questo permette di separare displays tabelle da displays blog.');
define('COM_SH404SEF_CONTENT_BLOG_NAME', 'Nome blog views di default');
define('COM_SH404SEF_TT_CONTENT_BLOG_NAME', 'Quando il parametro precedente &egrave; impostato su Si, puoi sovrascrivere il testo inserito nella SEF URL qui. Considera che questo testo sar&agrave; invariato, e non sar&agrave; tradotto.');
define('COM_SH404SEF_MTREE_TITLE', 'Configurazione Mosets Tree');
define('COM_SH404SEF_MTREE_INSERT_NAME', 'inserisci nome MTree');
define('COM_SH404SEF_TT_MTREE_INSERT_NAME', 'Se impostato su <strong>Si</strong>, il titolo dell&rsquo;elemento di menu che riporta a  Mosets Tree sar&agrave; indirizzato alla sua SEF URL.');
define('COM_SH404SEF_MTREE_NAME', 'Nome MTree di default');
define('COM_SH404SEF_MTREE_INSERT_LISTING_ID', 'Inserisci ID elenco');
define('COM_SH404SEF_TT_MTREE_INSERT_LISTING_ID', 'Se impostato su <strong>Si</strong>, l&rsquo; ID elenco sar&agrave; rimandato al suo nome, nel caso due elenchi dovessero avere lo stesso nome.');
define('COM_SH404SEF_MTREE_PREPEND_LISTING_ID', 'Riconduci ID al nome');
define('COM_SH404SEF_TT_MTREE_PREPEND_LISTING_ID', 'Se impostato su <strong>Si</strong>, quando anche l&rsquo;opzione precedente &egrave; stata impostata su Si, l&rsquo;ID sar&agrave; <strong>ricondotto</strong> al nome dell&rsquo;elenco. Se impostato su No, sar&agrave; <strong>aggiunto</strong>.');
define('COM_SH404SEF_MTREE_INSERT_LISTING_NAME', 'Inserisci nome elenco');
define('COM_SH404SEF_TT_MTREE_INSERT_LISTING_NAME', 'Se impostato su <strong>Si</strong>, un nome di elenco sar&agrave; inserito in tutti gli URL che riportano ad un&rsquo; azione su questo elenco.');
define('COM_SH404SEF_IJOOMLA_NEWSP_TITLE', 'Configurazione News Portal');
define('COM_SH404SEF_INSERT_IJOOMLA_NEWSP_NAME', 'Inserisci nome News Portal');
define('COM_SH404SEF_TT_INSERT_IJOOMLA_NEWSP_NAME', 'Se impostato su <strong>Si</strong>, il titolo dell&rsquo; elemento di menu che riconduce ad iJoomla News Portal sar&agrave; rimandato alla sua SEF URL.');
define('COM_SH404SEF_IJOOMLA_NEWSP_NAME', 'Nome News Portal di default');
define('COM_SH404SEF_INSERT_IJOOMLA_NEWSP_CAT_ID', 'Inserisci ID categoria');
define('COM_SH404SEF_TT_INSERT_IJOOMLA_NEWSP_CAT_ID', 'Se impostato su <strong>Si</strong>, un ID categoria sar&agrave; rimandato al suo nome, nel caso due categorie dovessero avere lo stesso nome.');
define('COM_SH404SEF_INSERT_IJOOMLA_NEWSP_SECTION_ID', 'Inserisci ID sezione');
define('COM_SH404SEF_TT_INSERT_IJOOMLA_NEWSP_SECTION_ID', 'Se impostato su <strong>Si</strong>, un ID sezione sar&agrave; rimandato al suo nome, nel caso due sezioni dovessero avere lo stesso nome.');
define('COM_SH404SEF_REMO_TITLE', 'Configurazione Remository');
define('COM_SH404SEF_REMO_INSERT_NAME', 'Inserisci nome Remository');
define('COM_SH404SEF_TT_REMO_INSERT_NAME', 'Se impostato su <strong>Si</strong>, il titolo dell&rsquo;elemento di menu che riporta alla Remository sar&agrave; indirizzato alla sua SEF URL.');
define('COM_SH404SEF_REMO_NAME', 'Nome Remository di default');
define('COM_SH404SEF_CB_SHORT_USER_URL', 'Short URL per profilo utente');
define('COM_SH404SEF_TT_CB_SHORT_USER_URL', 'Se impostato su <strong>Si</strong>, un utente sar&agrave; in grado di accedere al suo profilo attraverso uno short URL, simile a  www.mysite.com/username. Prima di attivare questa opzione, assicurati che questo non generer&agrave; nessun conflitto con gli URL esistenti nel sito.');
define('COM_SH404SEF_NEW_HOME_META', 'Home page Meta');
define('COM_SH404SEF_CONF_ERASE_HOME_META', 'Vuoi veramente cancellare il titolo della home page ed i meta tags ?');
define('COM_SH404SEF_UPGRADE_TITLE', 'Aggiorna configurazione');
define('COM_SH404SEF_UPGRADE_KEEP_URL', 'Conserva URL automatico');
define('COM_SH404SEF_TT_UPGRADE_KEEP_URL', 'Se impostato su <strong>Si</strong>, i SEF URL generati automaticamente da sh40SEF saranno messi da parte e conservati quando installi il componente. In questo modo, li ritroverai quando installerai una nuova versione, senza dover effettuare ulteriori procedimenti.');
define('COM_SH404SEF_UPGRADE_KEEP_CUSTOM', 'Conserva URL personalizzati, aliases, shURLs');
define('COM_SH404SEF_TT_UPGRADE_KEEP_CUSTOM', 'Se impostato su <strong>Si</strong>, i SEF URL personalizzati che puoi aver inserito saranno messi da parte e conservati quando disinstalli il componente. In questo modo, li ritroverai quando installerai una nuova versione, senza dover effettuare ulteriori procedimenti.');
define('COM_SH404SEF_UPGRADE_KEEP_META', 'Conserva Titolo e meta');
define('COM_SH404SEF_TT_UPGRADE_KEEP_META', 'Se impostato su <strong>Si</strong>, i Titoli personalizzati ed i Meta tags che puoi aver inserito saranno messi da parte e conservati quando disinstalli il componente. In questo modo, li ritroverai quando installerai una nuova versione, senza dover effettuare ulteriori procedimenti.');
define('COM_SH404SEF_UPGRADE_KEEP_MODULES', 'Conserva parametri dei moduli');
define('COM_SH404SEF_TT_UPGRADE_KEEP_MODULES', 'Se impostato su <strong>Si</strong>, gli attuali parametri di pubblicazione come posizione, ordine, titoli, ecc dei moduli shJoomfish e shCustomtags saranno messi da parte e conservati quando disinstalli il componente. In questo modo, li ritroverai quando installerai una nuova versione, senza dover effettuare ulteriori procedimenti.');
define('COM_SH404SEF_IMPORT_OPEN_SEF','Importa ridirezionamenti da OpenSEF');
define('COM_SH404SEF_IMPORT_ALL','Importa ridirezionamenti');
define('COM_SH404SEF_EXPORT_ALL','Esporta ridirezionamenti');
define('COM_SH404SEF_IMPORT_EXPORT_CUSTOM','Importa/Esporta ridirezionamenti personalizzati');
define('COM_SH404SEF_DUPLICATE_NOT_ALLOWED', 'Questo URL gi&agrave; esiste, nonostante tu non abbia permesso URL duplicati');
define('COM_SH404SEF_INSERT_CONTENT_MULTIPAGES_TITLE', 'Attiva titoli intelligenti degli articoli multipagina');
define('COM_SH404SEF_TT_INSERT_CONTENT_MULTIPAGES_TITLE', 'Se impostato su Si, Per gli articoli multipagina (quelli con una tabella di contenuti), sh404SEF user&agrave; i titoli delle pagine inserite utilizzando il comando mospagebreak : {mospagebreak title=Next_Page_Title & heading=Previous_Page_Title}, invece del numero di pagina.<br />Per esempio, un SEF URL simile a www.mysite.com/user-documentation/<strong>Page-2</strong>.html sar&agrave; sostituito da www.mysite.com/user-documentation/<strong>Getting-started-with-sh404SEF</strong>.html.');

// V x
define('COM_SH404SEF_UPGRADE_KEEP_CONFIG', 'Preserve configuration');
define('COM_SH404SEF_TT_UPGRADE_KEEP_CONFIG', 'If set to Yes, all configuration parameters will be stored and preserved when you unistall the component. This way, you will find them back when you install a new version, with no additional action required.');
define('COM_SH404SEF_CONF_TAB_SECURITY', 'Security');
define('COM_SH404SEF_SECURITY_TITLE', 'Security configuration');
define('COM_SH404SEF_HONEYPOT_TITLE', 'Project Honey Pot configuration');
define('COM_SH404SEF_CONF_HONEYPOT_DOC', 'Project Honey Pot is an initiative aiming at protecting web sites from spam robots. It provides a database to check a visitor IP address against known robots. Using this database requires an access key (free) you will have to obtain <a href="http://www.projecthoneypot.org/httpbl_configure.php">from the project web site</a><br />(You must create an account before requesting your access key - this is free as well). If you can, consider helping the project by setting up `traps` in your webspace, to help identify spam robots.');
define('COM_SH404SEF_ACTIVATE_SECURITY', 'Activate security functions');
define('COM_SH404SEF_TT_ACTIVATE_SECURITY', 'If set to Yes, sh404SEF will do some basic checks on the URLs requested to your web site, in order to protect it agains common attacks.');
define('COM_SH404SEF_LOG_ATTACKS', 'Log attacks');
define('COM_SH404SEF_TT_LOG_ATTACKS', 'If set to Yes, attacks identified will be logged to a text file, including IP address of attacker and page request made.<br />There is one log file per month. They are located in the <site root>/administrator/com_sh404sef/logs directory. You can download them using FTP, or use a Joomla utility such as Joomla Explorer to view them. They are TAB separated text file, so your spreadsheet software should open then up easily, probably the easiest way to view them.');	            
define('COM_SH404SEF_CHECK_HONEY_POT', 'Use Project Honey Pot');
define('COM_SH404SEF_TT_CHECK_HONEY_POT', 'If set to Yes, your visitors IP address will be checked against Project Hoeny Pot database, using their HTTP:BL service. It is free, but requires getting an access key from their web site.');
define('COM_SH404SEF_HONEYPOT_KEY', 'Project Honey Pot access key');
define('COM_SH404SEF_TT_HONEYPOT_KEY', 'If the Use Project Honey Pot option is activated, you must obtain an access key from P.H.P. Type the received access key here. It is a 12 characters string.');	             
define('COM_SH404SEF_HONEYPOT_ENTRANCE_TEXT', 'Alternative entry text');
define('COM_SH404SEF_TT_HONEYPOT_ENTRANCE_TEXT', 'If a visitor IP address has been tagged as suspicious by Project Honey Pot, access will be denied (403 result code). <br />However, in case of false detection, the text typed here will be shown to the visitor, with a linl he/she must click to actually access the site. Only a human can read and understand such text, and the robot cannot access the link. <br />You can adjust this text to your liking.' );	             
define('COM_SH404SEF_SMELLYPOT_TEXT', 'Robot trap text');
define('COM_SH404SEF_TT_SMELLYPOT_TEXT', 'When a spam robot has been identified through Project Honey Pot, and access has been denied, a link is added at the bottom of the deny screen, in order to have Project Honey Pot record the robot action. A message is also added to prevent real people to click on that link, in case they were wrongly flagged. ');
define('COM_SH404SEF_ONLY_NUM_VARS', 'Numeric parameters');
define('COM_SH404SEF_TT_ONLY_NUM_VARS', 'Parameter names put in this list will be checked for being only numeric : digits 0 to 9 only. Enter one parameter per line.');
define('COM_SH404SEF_ONLY_ALPHA_NUM_VARS', 'Alpha-numeric parameters');
define('COM_SH404SEF_TT_ONLY_ALPHA_NUM_VARS', 'Parameter names put in this list will be checked for being only alpha-numeric : digits from 0 to 9, and letters a through z. Enter one parameter per line');
define('COM_SH404SEF_NO_PROTOCOL_VARS', 'Check hyperlinks in parameters');
define('COM_SH404SEF_TT_NO_PROTOCOL_VARS', 'Parameter names put in this list will be checked for not having hyperlinks in them, starting with http://, https://, ftp:// ');
define('COM_SH404SEF_IP_WHITE_LIST', 'IP white list');
define('COM_SH404SEF_TT_IP_WHITE_LIST', 'Any page request coming from an IP address on this list will be <stong>accepted</strong>, assuming the URL passes the above mentioned checks. Enter one IP per line.<br />You can use * as a wildcard, as in : 192.168.0.*. This will comprise IP from 192.168.0.0 through 192.168.0.255.');
define('COM_SH404SEF_IP_BLACK_LIST', 'IP black list');
define('COM_SH404SEF_TT_IP_BLACK_LIST', 'Any page request coming from an IP address on this list will be <strong>denied</strong>, assuming the URL passes the above mentioned checks. Enter one IP per line.<br />You can use * as a wildcard, as in : 192.168.0.*. This will comprise IP from 192.168.0.1 through 192.168.0.255.');
define('COM_SH404SEF_UAGENT_WHITE_LIST', 'UserAgent white list');
define('COM_SH404SEF_TT_UAGENT_WHITE_LIST', 'Any request made with a UserAgent string on this list will be <stong>accepted</strong>, assuming the URL passes the above mentioned checks. Enter one UserAgent string per line.');
define('COM_SH404SEF_UAGENT_BLACK_LIST', 'UserAgent black list');
define('COM_SH404SEF_TT_UAGENT_BLACK_LIST', 'Any request made with a UserAgent string on this list will be <strong>denied</strong>, assuming the URL passes the above mentioned checks. Enter one UserAgent string per line');
define('COM_SH404SEF_MONTHS_TO_KEEP_LOGS', 'Months to keep security logs');
define('COM_SH404SEF_TT_MONTHS_TO_KEEP_LOGS', 'If logging of attacks is activated, you can set here the number of months to keep these log files. For instance, setting this to 1 means that the current month PLUS the month before will be kept available. Previous months log files will be deleted.');
define('COM_SH404SEF_ANTIFLOOD_TITLE', 'Configurazione Anti-flood');
define('COM_SH404SEF_ACTIVATE_ANTIFLOOD', 'Attiva anti-flood');
define('COM_SH404SEF_TT_ACTIVATE_ANTIFLOOD', 'Se impostato su Si, sh404SEF controller&agrave; che ogni indirizzo IP fornito non creer&agrave; troppe pagine di richiesta al tuo sito. Facendo molte richieste, una vicina all&rsquo;altra, un pirata pu&ograve; rendere il tuo sito inutilizzabile semplicemente sovraccaricandolo.');
define('COM_SH404SEF_ANTIFLOOD_ONLY_ON_POST', 'Solo se POST data (forms)');
define('COM_SH404SEF_TT_ANTIFLOOD_ONLY_ON_POST', 'Se impostato su Si, questo controllo avverr&agrave; solo se ci sono dei POST data nella richiesta della pagina. Questo di solito &egrave; il caso nelle pagine di form, cos&iacute; puoi limitare il controllo anti-flood ai forms solo per aiutare a proteggere il tuo sito contro i robots spamming dei commenti.');
define('COM_SH404SEF_ANTIFLOOD_PERIOD', 'Controllo Anti-flood');
define('COM_SH404SEF_TT_ANTIFLOOD_PERIOD', 'Tempo (in secondi) oltre il quale il numero di richieste dallo stesso indirizzo IP saranno controllate');
define('COM_SH404SEF_ANTIFLOOD_COUNT', 'Numero massimo di richieste');
define('COM_SH404SEF_TT_ANTIFLOOD_COUNT', 'Numero di richieste che daranno il via al blocco delle pagine per l&rsquo; indirizzo IP dannoso. Per esempio, inserendo Tempo = 10 e Numero di richieste = 4 bloccher&agrave; l&rsquo;accesso (restituisce un codice 403, ed una pagina pressoch&eacute; vuota) non appena saranno state ricevute 4 richieste da un determinato indirizzo IP in meno di 10 secondi. Naturalmente, l&rsquo;accesso sar&agrave; bloccato solo per questo indirizzo IP, e non per gli altri visitatori.');
define('COM_SH404SEF_CONF_TAB_LANGUAGES', 'Lingue');
define('COM_SH404SEF_DEFAULT', 'Default');
define('COM_SH404SEF_YES', 'Si');
define('COM_SH404SEF_NO', 'No');
define('COM_SH404SEF_TT_INSERT_LANGUAGE_CODE_PER_LANG', 'Se impostato su Si, il codice lingua sar&agrave; inserito nell&rsquo; URL come <strong>questa lingua</strong>. Se impostato su No, il codice lingua non sar&agrave; mai inserito. Se impostato su Default, il codice lingua sar&agrave; inserito per tutte le lingue tranne la lingua di default del sito.');
define('COM_SH404SEF_TT_TRANSLATE_URL_PER_LANG', 'Se impostato su Si, e il tuo sito &egrave; multilingua, il tuo URL sar&agrave; tradotto come URL <strong>in questa lingua</strong>, come per le impostazioni Joomfish. Se impostato su No, l&rsquo;URL non sar&agrave; mai tradotto. Se impostato su Default, sar&agrave anche tradotto. Non ha effetto sui siti monolingua.');
define('COM_SH404SEF_TT_INSERT_LANGUAGE_CODE_GEN', 'Se impostato su Si, un codice lingua sar&agrave; inserito nell&rsquo; URL costruito da sh404SEF. Puoi anche avere delle impostazioni a seconda della lingua impostata (vedi sotto).');
define('COM_SH404SEF_TT_TRANSLATE_URL_GEN', 'Se impostato su Si, ed il tuo sito &egrave; multilingua, l&rsquo;URL sar&agrave; tradotto nel linguaggio del tuo visitatore, come nei settaggi Joomfish. Altrimenti, gli URL rimarranno nella lingua di default del sito. Puoi anche avere delle impostazioni a seconda della lingua impostata (vedi sotto).');
define('COM_SH404SEF_ADV_COMP_DEFAULT_STRING', 'Nome di default');
define('COM_SH404SEF_TT_ADV_COMP_DEFAULT_STRING', 'Se inserisci qui una linea di testo, sar&agrave; inserita all&rsquo; inizio di tutti gli URL per quel componente. Di solito non &egrave; utilizzato, solo qui per compatibilit&agrave; arretrata con vecchi URL da altri componenti SEF.');
define('COM_SH404SEF_TT_NAME_BY_COMP', '. <br />Puoi inserire un nome che sar&agrave; usato invece del nome dell&rsquo;elemento di menu. Per fare questo, ti preghiamo di andare alla tabella <strong>Per componente</strong>. Considera che questo testo rimarr&agrave; invariato, e non sar&agrave; tradotto per su richiesta.');
define('COM_SH404SEF_STANDARD_ADMIN', 'Clicca qui per passare alla visualizzazione standard (solo con i parametri principali)');
define('COM_SH404SEF_ADVANCED_ADMIN', 'Clicca qui per passare alla visualizzazione estesa (con tutti i parametri disponibili)');
define('COM_SH404SEF_MULTIPLE_H1_TO_H2', 'Cambia h1 multipli in h2');
define('COM_SH404SEF_TT_MULTIPLE_H1_TO_H2', 'Se impostato su Si, e ci sono diverse istanze di tags h1 in una pagina, saranno trasformate in tags h2.<br />Se c&rsquo;&egrave; solo un tag h1 in una pagina, non sar&agrave; cambiato.');
define('COM_SH404SEF_INSERT_NOFOLLOW_PDF_PRINT', 'Inserisci tag nofollow sui link di stampa e PDF');
define('COM_SH404SEF_TT_INSERT_NOFOLLOW_PDF_PRINT', 'Se impostato su Si, gli attributi rel=nofollow saranno aggiunti a tutti i link PDF e di stampa creati da Joomla. Questo riduce i contenuti duplicati visti dai motori di ricerca.');
define('COM_SH404SEF_INSERT_READMORE_PAGE_TITLE', 'Inserisci titolo nei links Leggi tutto...');
define('COM_SH404SEF_TT_INSERT_READMORE_PAGE_TITLE', 'Se impostato su Si, ed un link Leggi tutto... &egrave; visualizzato in una pagina, il titolo del contenuto corrispondente sar&agrave; inserito nel link, per migliorare il peso del link nei motori di ricerca');
define('COM_SH404SEF_VM_USE_ITEMS_PER_PAGE', 'Using Items per page drop-down list');
define('COM_SH404SEF_TT_VM_USE_ITEMS_PER_PAGE', 'If set to Yes, URLs will be adjusted to allow for using drop-down lists to let user select the number of items per page. If you don&rsquo;t use such drop-down lists, AND your URLs are already indexed by search engines, you can set it to NO to keep your existing URL. ');
define('COM_SH404SEF_CHECK_POST_DATA', 'Check also forms data (POST)');
define('COM_SH404SEF_TT_CHECK_POST_DATA', 'If set to Yes, data coming from input forms will be checked against passing config variables or similar threats. This may cause unneeded blockages if you have, for instance, a forum where users may discuss such things as Joomla programming or similar. They may then want to discuss the exact text strings we are looking for as a potential attack. You should then disable this feature if you experience unappropriate forbidden access');
define('COM_SH404SEF_SEC_STATS_TITLE', 'Security stats');
define('COM_SH404SEF_SEC_STATS_UPDATE', 'Click here to update blocked attacks counters');
define('COM_SH404SEF_TOTAL_ATTACKS', 'Blocked attacks count');
define('COM_SH404SEF_TOTAL_CONFIG_VARS', 'mosConfig var in URL');
define('COM_SH404SEF_TOTAL_BASE64', 'Base64 injection');
define('COM_SH404SEF_TOTAL_SCRIPTS', 'Script injection');
define('COM_SH404SEF_TOTAL_STANDARD_VARS', 'Illegal standard vars');
define('COM_SH404SEF_TOTAL_IMG_TXT_CMD', 'remote file inclusion');
define('COM_SH404SEF_TOTAL_IP_DENIED', 'IP address denied');
define('COM_SH404SEF_TOTAL_USER_AGENT_DENIED', 'User agent denied');
define('COM_SH404SEF_TOTAL_FLOODING', 'Too many requests (flooding)');
define('COM_SH404SEF_TOTAL_PHP', 'Rejected by Project Honey Pot');
define('COM_SH404SEF_TOTAL_PER_HOUR', ' /h');
define('COM_SH404SEF_SEC_DEACTIVATED', 'Sec. functions not in use');
define('COM_SH404SEF_TOTAL_PHP_USER_CLICKED', 'PHP, but user clicked');

define('COM_SH404SEF_PREPEND_TO_PAGE_TITLE', 'Insert before page title');
define('COM_SH404SEF_TT_PREPEND_TO_PAGE_TITLE', 'Any text entered her will be prepended to all page title tags.');
define('COM_SH404SEF_APPEND_TO_PAGE_TITLE', 'Append to page title');
define('COM_SH404SEF_TT_APPEND_TO_PAGE_TITLE', 'Any text entered here will be appended to all page title tags.');
define('COM_SH404SEF_DEBUG_TO_LOG_FILE', 'Log debug info to file');
define('COM_SH404SEF_TT_DEBUG_TO_LOG_FILE', 'If set to Yes, sh404SEF will log to a text file many internal information. This data will help us troubleshoot problems you may be facing using sh404SEF. <br/>Warning: this file can quickly become fairly big. Also, this function will certainly slow down your site. Be sure to turn it on only when required. For this reason, it will de-activate automaticaly one hour after being started. Just turn it off then on again to activate it again. The log file is located in /administrator/components/com_sh404sef/logs/ ');

define('COM_SH404SEF_ALIAS_LIST', 'Alias list');
define('COM_SH404SEF_TT_ALIAS_LIST', 'Enter here a list of alias for this URL. Put only one alias per line, like :<br/>old-url.html<br/>or<br/>my-other-old-url.php?var=12&test=15<br>sh404SEF will do a 301 redirect to the current SEF URL if any one of those aliases is requested.');
define('COM_SH404SEF_HOME_ALIAS', 'Home page alias');
define('COM_SH404SEF_TT_HOME_PAGE_ALIAS_LIST', 'Enter here a list of alias for your home page. Put only one alias per line, like :<br/>old-url.html<br/>or<br/>my-other-old-url.php?var=12&test=15<br>sh404SEF will do a 301 redirect to your home page if any one of those aliases is requested');

define('COM_SH404SEF_INSERT_OUTBOUND_LINKS_IMAGE', 'Insert outbound links symbol');
define('COM_SH404SEF_TT_INSERT_OUTBOUND_LINKS_IMAGE', 'If set to Yes, a visual symbol will be inserted next to every link targeting another website, to allow easier identification of these links.');
define('COM_SH404SEF_OUTBOUND_LINKS_IMAGE_BLACK', 'Use black symbol');
define('COM_SH404SEF_OUTBOUND_LINKS_IMAGE_WHITE', 'Use white symbol');
define('COM_SH404SEF_OUTBOUND_LINKS_IMAGE', 'Outbound links color symbol');
define('COM_SH404SEF_TT_OUTBOUND_LINKS_IMAGE', 'Both images have a transparent background. Select the black one if your site has a white background. Select the white one if your site has a dark background. These images are  /administrator/components/com_sef/images/external-white.png and external-black.png. They are 15x16 pixels in size.');

// V 1.3.3
define('COM_SH404SEF_DEFAULT_PARAMS_TITLE', 'Very adv.');
define('COM_SH404SEF_DEFAULT_PARAMS_WARNING', 'WARNING: change these values only if you know what you are doing! In case of wrongdoing, you could make damages you will have trouble repairing.');

// V 1.0.12
define('COM_SH404SEF_USE_CAT_ALIAS', 'Use category alias');
define('COM_SH404SEF_TT_USE_CAT_ALIAS', 'If set to <strong>Yes</strong>, sh404sef will use a category alias instead of its actual name every time that name is required to build a url');
define('COM_SH404SEF_USE_SEC_ALIAS', 'Use section alias');
define('COM_SH404SEF_TT_USE_SEC_ALIAS', 'If set to <strong>Yes</strong>, sh404sef will use a section alias instead of its actual name every time that name is required to build a url');
define('COM_SH404SEF_USE_MENU_ALIAS', 'Use menu alias');
define('COM_SH404SEF_TT_USE_MENU_ALIAS', 'If set to <strong>Yes</strong>, sh404sef will use a menu item alias instead of its actual title every time that title is required to build a url');
define('COM_SH404SEF_ENABLE_TABLE_LESS', 'Use table-less output');
define('COM_SH404SEF_TT_ENABLE_TABLE_LESS', 'If set to <strong>Yes</strong>, sh404sef will make Joomla use only div tags (no table tags) when outputing content, regardless of the template you are using. You should not have removed the Beez template for this to work. Beez template is installed by default with Joomla.<br /><strong>WARNING</strong> : you will have to adjust your template stylesheet to match this new html output format.');

// V 1.0.13
define( 'COM_SH404SEF_JC_MODULE_CACHING_DISABLED', 'Caching for Joomfish language selection module has been disabled!');

// V 1.5.3
define('COM_SH404SEF_ALWAYS_APPEND_ITEMS_PER_PAGE', 'Always append #items per page');
define('COM_SH404SEF_TT_ALWAYS_APPEND_ITEMS_PER_PAGE', 'If set to <strong>Yes</strong>, sh404sef will always append the number of items per page to paginated urls. For instance, .../Page-2.html will become .../Page2-10.html, if the current settings cause 10 items to be displayed per page. This is required for instance if you activated drop-down lists to let your user select number of items per page.');
define('COM_SH404SEF_REDIRECT_CORRECT_CASE_URL', '301 redirect url to correct case');
define('COM_SH404SEF_TT_REDIRECT_CORRECT_CASE_URL', 'If set to <strong>Yes</strong>, sh404sef will perform a 301 redirect from a SEF url if it does not have the same case as an url found in the database. For instance, example.com/My-page.html will be redirected to example.com/my-page.html, if the latter is stored in the database. Conversely, example.com/my-page.html will be redirected to example.com/My-page.html if the later is the url used on your site, and therefore stored in the database.');

// V 1.5.5
define('COM_SH404SEF_JOOMLA_LIVE_SITE', 'Joomla live_site');
define('COM_SH404SEF_TT_JOOMLA_LIVE_SITE', 'You should see here the root url of your web site. For instance:<br />http://www.example.com<br/>or<br/> http://example.com<br />(no trailing slash)<br />This is not a sh404sef setting, but rather a <b>Joomla</b> setting. It is stored in Joomla\'s own configuration.php file.<br />Joomla will normally auto-detect your web site root address. However, if the address displayed here is not correct, you should set it yourself manually. This is done by modifying the content of Joomla configuration.php (usually using FTP).<br/>Symptoms linked to a bad value are : template or images do not display, buttons does not operate, all styles (colors, fonts, etc) are missing, etc...');
define('COM_SH404SEF_TT_JOOMLA_LIVE_SITE_MISSING', 'WARNING: $live_site missing from Joomla configuration.php file, or does not start with "http://" or "https://" !');
define('COM_SH404SEF_JCL_INSERT_EVENT_ID', 'Insert event Id');
define('COM_SH404SEF_TT_JCL_INSERT_EVENT_ID', 'If set to Yes, event internal id will be prepended to the event title in the urls, to make them unique');
define('COM_SH404SEF_JCL_INSERT_CATEGORY_ID', 'Insert category id');
define('COM_SH404SEF_TT_JCL_INSERT_CATEGORY_ID', 'If set to Yes, when a category is used in a url, it will be prepended with the internal category id, to make it unique.');
define('COM_SH404SEF_JCL_INSERT_CALENDAR_ID', 'Insert calendar id');
define('COM_SH404SEF_TT_JCL_INSERT_CALENDAR_ID', 'If set to Yes, when a calendar name is used in a url, it will be prepended with this calendar internal id, to make it unique');
define('COM_SH404SEF_JCL_INSERT_CALENDAR_NAME', 'Insert Calendar name');
define('COM_SH404SEF_TT_JCL_INSERT_CALENDAR_NAME', 'If set to Yes, all urls where a specific calendar is set will have that calendar name included in the url. If no calendar id is specified in the url, the menu item title will be included instead');
define('COM_SH404SEF_JCL_INSERT_DATE', 'Insert date');
define('COM_SH404SEF_TT_JCL_INSERT_DATE', 'If set to yes, the date of the target page will be inserted into each url');
define('COM_SH404SEF_JCL_INSERT_DATE_IN_EVENT_VIEW', 'Insert date in event link');
define('COM_SH404SEF_TT_JCL_INSERT_DATE_IN_EVENT_VIEW', 'If set to Yes, each event date will be prepended to urls to the event details page');
define('COM_SH404SEF_JCL_TITLE', 'JCal Pro configuration');
define('COM_SH404SEF_PAGE_TITLE_TITLE', 'Page title configuration');
define('COM_SH404SEF_CONTENT_TITLE_TITLE', 'Joomla content page title configuration');
define('COM_SH404SEF_CONTENT_TITLE_SHOW_SECTION', 'Insert section');
define('COM_SH404SEF_TT_CONTENT_TITLE_SHOW_SECTION', 'If set to Yes, an article section will be inserted in the page title of that article');
define('COM_SH404SEF_CONTENT_TITLE_SHOW_CAT', 'Insert category');
define('COM_SH404SEF_TT_CONTENT_TITLE_SHOW_CAT', 'If set to Yes, an article category will be inserted in the page title of that article');
define('COM_SH404SEF_CONTENT_TITLE_USE_ALIAS', 'Use article title alias');
define('COM_SH404SEF_TT_CONTENT_TITLE_USE_ALIAS', 'If set to Yes, the article alias will be used in the page title instead of the actual article title');
define('COM_SH404SEF_CONTENT_TITLE_USE_CAT_ALIAS', 'Use category alias');
define('COM_SH404SEF_TT_CONTENT_TITLE_USE_CAT_ALIAS', 'If set to Yes, a category alias will be used in the page title instead of the actual category title');
define('COM_SH404SEF_CONTENT_TITLE_USE_SEC_ALIAS', 'Use section alias');
define('COM_SH404SEF_TT_CONTENT_TITLE_USE_SEC_ALIAS', 'If set to Yes, a section alias will be used the page title instead of the actual section title');
define('COM_SH404SEF_PAGE_TITLE_SEPARATOR', 'Page title separator');
define('COM_SH404SEF_TT_PAGE_TITLE_SEPARATOR', 'Enter here a character or a string to separate the various parts of the page title, if there is more than one. Defaults to the | character, surrounded by a single space');

// V 1.5.7
define('COM_SH404SEF_DISPLAY_DUPLICATE_URLS_TITLE', 'Duplicates');
define('COM_SH404SEF_DISPLAY_DUPLICATE_URLS_NOT', 'Show only main url');
define('COM_SH404SEF_DISPLAY_DUPLICATE_URLS', 'Show main and duplicate urls');
define('COM_SH404SEF_INSERT_ARTICLE_ID_TITLE', 'Insert article id in URL');
define('COM_SH404SEF_TT_INSERT_ARTICLE_ID_TITLE', 'If set to <strong>Yes</strong>, an article internal id will be appended to the title of that article in URLs, in order to be sure each article can be accessed individually, even if 2 articles have the exact same titles, or titles that yields the same URL (after being cleaned up for invalid characters and such). This id will bring no SEO value, and you should rather make sure you do not have articles with the same title in the same section and category.<br />In case you do not control article entries, this setting may help you make sure articles can be accessed, at the cost of good search engine optimization.');

// V 1.5.8

define('COM_SH404SEF_JS_TITLE', 'JomSocial configuration ');
define('COM_SH404SEF_JS_INSERT_NAME', 'Insert JomSocial name');
define('COM_SH404SEF_TT_JS_INSERT_NAME', 'If set to <strong>Yes</strong>, the menu element title leading to JomSocial main page will be prepended to all JomSocial SEF URL');
define('COM_SH404SEF_JS_INSERT_USER_NAME', 'Insert user short name');
define('COM_SH404SEF_TT_JS_INSERT_USER_NAME', 'If set to <strong>Yes</strong>, user name will be inserted into SEF URLs. <strong>WARNING</strong>: this can lead to substantial increase in database size, and can slow down site, if you have many registered users.');
define('COM_SH404SEF_JS_INSERT_USER_FULL_NAME', 'Insert user full name');
define('COM_SH404SEF_TT_JS_INSERT_USER_FULL_NAME', 'If set to <strong>Yes</strong>, user full name will be inserted into SEF URLs. <strong>WARNING</strong>: this can lead to substantial increase in database size, and can slow down site, if you have many registered users.');
define('COM_SH404SEF_JS_INSERT_GROUP_CATEGORY', 'Insert group category');
define('COM_SH404SEF_TT_JS_INSERT_GROUP_CATEGORY', 'If set to <strong>Yes</strong>, a users group\'s category will be inserted into SEF URLs where the group name is used.');
define('COM_SH404SEF_JS_INSERT_GROUP_CATEGORY_ID', 'Insert group category ID');
define('COM_SH404SEF_TT_JS_INSERT_GROUP_CATEGORY_ID', 'If set to <strong>Yes</strong>, a users group category ID will be prepended to the category name <strong>when previous option is also set to Yes</strong>, just in case two categories have the same name.');
define('COM_SH404SEF_JS_INSERT_GROUP_ID', 'Insert group ID');
define('COM_SH404SEF_TT_JS_INSERT_GROUP_ID', 'If set to <strong>Yes</strong>, a users group ID will be prepended to the group name, just in case two groups have the same name.');
define('COM_SH404SEF_JS_INSERT_GROUP_BULLETIN_ID', 'Insert group bulletin ID');
define('COM_SH404SEF_TT_JS_INSERT_GROUP_BULLETIN_ID', 'If set to <strong>Yes</strong>, a users group bulletin ID will be prepended to the bulletin name, just in case two bulletins have the same name.');
define('COM_SH404SEF_JS_INSERT_DISCUSSION_ID', 'Insert group discussion ID');
define('COM_SH404SEF_TT_JS_INSERT_DISCUSSION_ID', 'If set to <strong>Yes</strong>, a users group discussion ID will be prepended to the discussion name, just in case two discussions have the same name.');
define('COM_SH404SEF_JS_INSERT_MESSAGE_ID', 'Insert message ID');
define('COM_SH404SEF_TT_JS_INSERT_MESSAGE_ID', 'If set to <strong>Yes</strong>, a message ID will be prepended to the message name, just in case two messages have the same subject.');
define('COM_SH404SEF_JS_INSERT_PHOTO_ALBUM', 'Insert photo album name');
define('COM_SH404SEF_TT_JS_INSERT_PHOTO_ALBUM', 'If set to <strong>Yes</strong>, the name of the album it belongs to will be inserted into SEF URLs of a photo or set of photos.');
define('COM_SH404SEF_JS_INSERT_PHOTO_ALBUM_ID', 'Insert photo album ID');
define('COM_SH404SEF_TT_JS_INSERT_PHOTO_ALBUM_ID', 'If set to <strong>Yes</strong>, an album ID will be prepended to the album name, just in case two albums have the same subject.');
define('COM_SH404SEF_JS_INSERT_PHOTO_ID', 'Insert photo ID');
define('COM_SH404SEF_TT_JS_INSERT_PHOTO_ID', 'If set to <strong>Yes</strong>, a photo ID will be prepended to the photo name, just in case two photos have the same subject.');
define('COM_SH404SEF_JS_INSERT_VIDEO_CAT', 'Insert video category name');
define('COM_SH404SEF_TT_JS_INSERT_VIDEO_CAT', 'If set to <strong>Yes</strong>, the name of the category it belongs to will be inserted into SEF URLs of a video or set of videos.');
define('COM_SH404SEF_JS_INSERT_VIDEO_CAT_ID', 'Insert video category ID');
define('COM_SH404SEF_TT_JS_INSERT_VIDEO_CAT_ID', 'If set to <strong>Yes</strong>, a video category ID will be prepended to the category name, just in case two categories have the same subject.');
define('COM_SH404SEF_JS_INSERT_VIDEO_ID', 'Insert video ID');
define('COM_SH404SEF_TT_JS_INSERT_VIDEO_ID', 'If set to <strong>Yes</strong>, a video ID will be prepended to the video name, just in case two videos have the same subject.');
define('COM_SH404SEF_FB_INSERT_USERNAME', 'Insert user name');
define('COM_SH404SEF_TT_FB_INSERT_USERNAME', 'If set to <strong>Yes</strong>, the username will be inserted into SEF URLs for her posts or profile.');
define('COM_SH404SEF_FB_INSERT_USER_ID', 'Insert user ID');
define('COM_SH404SEF_TT_FB_INSERT_USER_ID', 'If set to <strong>Yes</strong>, a user ID will be prepended to her name, if the preceding setting is set to yes, just in case two users have the same username.');
define('COM_SH404SEF_PAGE_NOT_FOUND_ITEMID', 'Itemid to use for 404 page');
define('COM_SH404SEF_TT_PAGE_NOT_FOUND_ITEMID', 'The value entered here, if non zero, will be used to display the 404 page. Joomla will use the Itemid to decide which template and modules to display. Itemid represents a menu item, so you can look up Itemids in your menus list.');

//define('', '');
