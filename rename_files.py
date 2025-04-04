import os
from bs4 import BeautifulSoup

# Directory containing the HTML files
directory = r"C:\Users\rahul\OneDrive\Desktop\pandit\padit\housebox-html-demo.vercel.app"

# Function to determine if an href is a local page link (not external or anchor)
def is_local_page_link(href):
    if not href:  # Skip empty href
        return False
    # Skip external URLs, anchors, mailto, tel, or file extensions other than .html
    if (href.startswith('http') or href.startswith('#') or 
        href.startswith('mailto:') or href.startswith('tel:') or 
        href.endswith('.css') or href.endswith('.js') or href.endswith('.png') or 
        href.endswith('.jpg') or href.endswith('.jpeg') or href.endswith('.gif')):
        return False
    return True

# Function to add .html to href if missing
def fix_href(href):
    if href.endswith('.html'):  # Already has .html
        return href
    if href.endswith('/'):  # Remove trailing slash if present
        href = href.rstrip('/')
    return href + '.html'

# Function to process an HTML file
def process_html_file(file_path):
    try:
        # Read the HTML file
        with open(file_path, 'r', encoding='utf-8') as file:
            soup = BeautifulSoup(file, 'html.parser')

        # Find all <a> tags with href attributes
        links = soup.find_all('a', href=True)
        modified = False

        for link in links:
            href = link['href']
            if is_local_page_link(href):
                new_href = fix_href(href)
                if new_href != href:  # Only update if there's a change
                    link['href'] = new_href
                    modified = True
                    print(f"Updated in {file_path}: {href} -> {new_href}")

        # If any links were modified, write the updated content back
        if modified:
            with open(file_path, 'w', encoding='utf-8') as file:
                file.write(str(soup))
            print(f"File updated: {file_path}")
        else:
            print(f"No changes needed in: {file_path}")

    except Exception as e:
        print(f"Error processing {file_path}: {e}")

# Main script
print("Starting to process HTML files...\n")

# Walk through the directory and process only .html files
for root, dirs, files in os.walk(directory):
    for file in files:
        if file.endswith('.html'):
            file_path = os.path.join(root, file)
            process_html_file(file_path)

print("\nProcessing completed.")