import os
import re

def update_global_elements():
    # Read the source of truth (index.html)
    with open('index.html', 'r', encoding='utf-8') as f:
        index_content = f.read()

    # Extract header block
    header_match = re.search(r'<!-- Main Header-->.*?<!--End Main Header -->', index_content, flags=re.DOTALL)
    if not header_match:
        print("Error: Could not find header in index.html")
        return
    header_content = header_match.group(0)

    # Extract footer block
    footer_match = re.search(r'<footer.*?>.*?</footer>', index_content, flags=re.DOTALL)
    if not footer_match:
        print("Error: Could not find footer in index.html")
        return
    footer_content = footer_match.group(0)

    html_files = [f for f in os.listdir('.') if f.endswith('.html') and f != 'index.html']
    
    count = 0
    for file in html_files:
        with open(file, 'r', encoding='utf-8') as f:
            content = f.read()
            
        modified = False
        
        # Replace header
        # Some files might not have <!-- Main Header-->, they might just have <header>
        if '<!-- Main Header-->' in content:
            content = re.sub(r'<!-- Main Header-->.*?<!--End Main Header -->', header_content, content, flags=re.DOTALL)
            modified = True
        else:
            # Fallback for files without the comment wrappers
            content, n = re.subn(r'<header.*?>.*?</header>', header_content, content, flags=re.DOTALL)
            if n > 0:
                modified = True
                
        # Replace footer
        content, n = re.subn(r'<footer.*?>.*?</footer>', footer_content, content, flags=re.DOTALL)
        if n > 0:
            modified = True
            
        if modified:
            with open(file, 'w', encoding='utf-8') as f:
                f.write(content)
            count += 1
            print(f"Updated {file}")

    print(f"Total files updated: {count}")

if __name__ == '__main__':
    update_global_elements()
