const fs = require('fs');
const path = require('path');

function updateGlobalElements() {
    // Read the source of truth (index.html)
    const indexContent = fs.readFileSync('index.html', 'utf-8');

    // Extract header block
    const headerMatch = indexContent.match(/<!-- Main Header-->[\s\S]*?<!--End Main Header -->/);
    if (!headerMatch) {
        console.error("Error: Could not find header in index.html");
        return;
    }
    const headerContent = headerMatch[0];

    // Extract footer block
    const footerMatch = indexContent.match(/<footer[\s\S]*?<\/footer>/);
    if (!footerMatch) {
        console.error("Error: Could not find footer in index.html");
        return;
    }
    const footerContent = footerMatch[0];

    const files = fs.readdirSync('.');
    const htmlFiles = files.filter(f => f.endsWith('.html') && f !== 'index.html');
    
    let count = 0;
    for (const file of htmlFiles) {
        let content = fs.readFileSync(file, 'utf-8');
        let modified = false;
        
        // Replace header
        if (content.includes('<!-- Main Header-->')) {
            content = content.replace(/<!-- Main Header-->[\s\S]*?<!--End Main Header -->/, headerContent);
            modified = true;
        } else {
            // Fallback
            const replaced = content.replace(/<header[\s\S]*?<\/header>/, headerContent);
            if (replaced !== content) {
                content = replaced;
                modified = true;
            }
        }
                
        // Replace footer
        const replacedFooter = content.replace(/<footer[\s\S]*?<\/footer>/, footerContent);
        if (replacedFooter !== content) {
            content = replacedFooter;
            modified = true;
        }
            
        if (modified) {
            fs.writeFileSync(file, content, 'utf-8');
            count++;
            console.log(`Updated ${file}`);
        }
    }

    console.log(`Total files updated: ${count}`);
}

updateGlobalElements();
