import os
import re

# Use index.html as the source of truth for header and footer
with open('index.html', 'r', encoding='utf-8') as f:
    index_content = f.read()

# Extract header
header_match = re.search(r'([\s\S]*?<!--End Main Header -->)', index_content)
if not header_match:
    print("Could not find header in index.html")
    exit(1)
header_html = header_match.group(1)

# Extract footer
footer_match = re.search(r'(<footer class="footer-section">[\s\S]*)', index_content)
if not footer_match:
    print("Could not find footer in index.html")
    exit(1)
footer_html = footer_match.group(1)

# Replace .html links with .php in header and footer
def replace_html_links(html_content):
    # This regex specifically targets href="...html"
    return re.sub(r'href="([^"]+)\.html"', r'href="\1.php"', html_content)

header_php = replace_html_links(header_html)
footer_php = replace_html_links(footer_html)

# Create include/ directory if it doesn't exist
os.makedirs('include', exist_ok=True)

# Write header.php and footer.php
with open('include/header.php', 'w', encoding='utf-8') as f:
    f.write(header_php)

with open('include/footer.php', 'w', encoding='utf-8') as f:
    f.write(footer_php)

print("Created include/header.php and include/footer.php")

# Now process all .html files
html_files = [f for f in os.listdir('.') if f.endswith('.html')]

for html_file in html_files:
    with open(html_file, 'r', encoding='utf-8') as f:
        content = f.read()

    # Replace header
    content = re.sub(r'^[\s\S]*?<!--End Main Header -->', '<?php include \'include/header.php\'; ?>', content)
    
    # Replace footer
    content = re.sub(r'<footer class="footer-section">[\s\S]*$', '<?php include \'include/footer.php\'; ?>', content)
    
    # Replace links
    content = replace_html_links(content)
    
    # Write to .php
    php_file = html_file.replace('.html', '.php')
    with open(php_file, 'w', encoding='utf-8') as f:
        f.write(content)
    
    # Remove .html file
    os.remove(html_file)
    print(f"Converted {html_file} to {php_file}")

print("Done converting all pages to PHP!")
