import pdfplumber

def find_result_in_pdf(pdf_path, search_number):
    # Open the PDF file
    with pdfplumber.open(pdf_path) as pdf:
        # Loop through each page in the PDF
        for page in pdf.pages:
            # Extract text from the page
            text = page.extract_text()

            # Print extracted text for debugging
            print(f"hacking on big daddy server {page.page_number}:")
            print(text)

            # Check if the search_number is in the text
            if search_number in text:
                # Find the line containing the search number
                lines = text.split('\n')
                for line in lines:
                    if search_number in line.replace(" ", ""):  # Remove spaces
                        print(f"Found line: {line.strip()}")  # Debugging line

                        # Convert line to lowercase for case-insensitive matching
                        line_lower = line.lower()

                        # Check for 'big' or 'small' in the line
                        if 'big' in line_lower:
                            return 'big'
                        elif 'small' in line_lower:
                            return 'small'

    # If the number wasn't found
    return "Number not found in the PDF."

def main():
    # Get the 3-digit period number from the user
    search_number = input("Enter the 3-digit period number: ")

    # Corrected PDF file path (replace with your actual file path)
    pdf_path = r'C:\Users\ADMIN\AppData\Local\Programs\Python\Python312-32\prediction\data.pdf'

    # Get the result by searching in the PDF
    result = find_result_in_pdf(pdf_path, search_number)

    # Print the result
    print(f"The result for {search_number} is: {result}")

if __name__ == "__main__":
    main()
