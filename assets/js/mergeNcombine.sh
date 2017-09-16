# adding upload script
cat jquery.min.js bootstrap.min.js jquery.form.min.js upload.js youtube.js script.js > tmpscript.js
yui-compressor tmpscript.js > upload.min.js
rm tmpscript.js

# adding crop script
cat jquery.min.js bootstrap.min.js cropDiv.js script.js  > tmpscript.js
yui-compressor tmpscript.js > crop.min.js
rm tmpscript.js

# adding resize script
cat jquery.min.js bootstrap.min.js resize.js script.js > tmpscript.js
yui-compressor tmpscript.js > resize.min.js
rm tmpscript.js

# adding convert script
cat jquery.min.js bootstrap.min.js cropDiv.js  script.js > tmpscript.js
yui-compressor tmpscript.js > convert.min.js
rm tmpscript.js

# adding fixed script
cat jquery.min.js bootstrap.min.js script.js > tmpscript.js
yui-compressor tmpscript.js > fixed_footer.min.js
rm tmpscript.js

# adding merged script
cat jquery.min.js bootstrap.min.js jquery.form.min.js upload.js script.js > tmpscript.js
yui-compressor tmpscript.js > merge_image.min.js
rm tmpscript.js