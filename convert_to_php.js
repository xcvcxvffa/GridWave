const fs = require('fs');
const path = require('path');

// Use index.html as the source of truth for header and footer
const indexContent = fs.readFileSync('index.html', 'utf-8');

// Extract header
const headerMatch = indexContent.match(/([\s\S]*?<!--End Main Header -->)/);
if (!headerMatch) {
    console.error("Could not find header in index.html");
    process.exit(1);
}
const headerHtml = headerMatch[1];

// Extract footer
const footerMatch = indexContent.match(/(<footer class="footer-section">[\s\S]*)/);
if (!footerMatch) {
    console.error("Could not find footer in index.html");
    process.exit(1);
}
const footerHtml = footerMatch[1];

// Replace .html links with .php in header and footer
function replaceHtmlLinks(htmlContent) {
    return htmlContent.replace(/href="([^"]+)\.html"/g, 'href="$1.php"');
}

const headerPhp = replaceHtmlLinks(headerHtml);
const footerPhp = replaceHtmlLinks(footerHtml);

// Create include/ directory if it doesn't exist
if (!fs.existsSync('include')) {
    fs.mkdirSync('include');
}

// Write header.php and footer.php
fs.writeFileSync('include/header.php', headerPhp, 'utf-8');
fs.writeFileSync('include/footer.php', footerPhp, 'utf-8');

console.log("Created include/header.php and include/footer.php");

// Now process all .html files
const files = fs.readdirSync('.');
const htmlFiles = files.filter(f => f.endsWith('.html'));

for (const htmlFile of htmlFiles) {
    let content = fs.readFileSync(htmlFile, 'utf-8');

    // Replace header
    content = content.replace(/^[\s\S]*?<!--End Main Header -->/, "<?php include 'include/header.php'; ?>");
    
    // Replace footer
    content = content.replace(/<footer class="footer-section">[\s\S]*$/, "<?php include 'include/footer.php'; ?>");
    
    // Replace links
    content = replaceHtmlLinks(content);
    
    // Write to .php
    const phpFile = htmlFile.replace('.html', '.php');
    fs.writeFileSync(phpFile, content, 'utf-8');
    
    // Remove .html file
    fs.unlinkSync(htmlFile);
    console.log(`Converted ${htmlFile} to ${phpFile}`);
}

console.log("Done converting all pages to PHP!");
