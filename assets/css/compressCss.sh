# adding upload script
cat bootstrap.min.css  style.css  > tmp.css
yui-compressor tmp.css > style.min.css
rm tmp.css
yui-compressor youtube.css > youtube.min.css

