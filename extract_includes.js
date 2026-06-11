const fs = require('fs');
const path = require('path');

function extractIncludes() {
    const indexContent = fs.readFileSync('index.html', 'utf-8');

    const headerMatch = indexContent.match(/<!-- Main Header-->[\s\S]*?<!--End Main Header -->/);
    if (headerMatch) {
        fs.writeFileSync(path.join('include', 'header.html'), headerMatch[0], 'utf-8');
        console.log("Created include/header.html");
    }

    const footerMatch = indexContent.match(/<footer[\s\S]*?<\/footer>/);
    if (footerMatch) {
        fs.writeFileSync(path.join('include', 'footer.html'), footerMatch[0], 'utf-8');
        console.log("Created include/footer.html");
    }
}

extractIncludes();
