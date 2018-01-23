//****************************//
// HOW TO USE LANGUAGES FILES //
//****************************//

Here the steps to translate the plugin's strings in your language:

1. Make sure you have set your WP installation in your language (Settings > General around the end of page)

2. Duplicate the file .pot you have in this folder and rename it gutenberg-manager + the exact language code, for example gutenberg-manager-it_IT.po for Italian Language (please note .po and not .pot)
(here a complete list of languages and their codes -> https://make.wordpress.org/polyglots/teams/)

3. Now you only have to open gutenberg-manager-it_IT.po using the Poedit software
(source -> https://poedit.net/)

4. Translate the strings using the specific field and save the .po file

5. Ok, poedit will generate also another file on the languages folder, a gutenberg-manager-it_IT.mo file. You only have to upload both new files .po and .mo on remote server

Now the plugin's strings will be translated in your language!