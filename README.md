### WonderCMS plugins
Plugins development repository for WonderCMS: https://wondercms.com

All approved plugins get upladed to the forum at: https://wondercms.com/forum

### List of WonderCMS approved plugins
- Trumbowyg (WYSIWYG editor)
- File uploader

### Installation
1. Upload the chosen plugin along with its folder into your WonderCMS plugins folder.

Your chosen plugin will start working automatically.

### If any errors occur, please correct file permissions to 644 and folder permissions to 755. You can do this manually or with the script below (added by Bill Carson)
  - `find ./ -type d -exec chmod 755 {} \;`
  - `find ./ -type f -exec chmod 644 {} \;`
