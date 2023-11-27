import os
import random
import string
import re  # Import the regular expressions module


# Define the directory path where your files are located
directory_path = '/Users/christopher/Pictures/Private'
def generate_random_string(length=6):
    characters = string.ascii_letters + string.digits
    return ''.join(random.choice(characters) for i in range(length))

# Loop through all files in the directory
for filename in os.listdir(directory_path):
    if filename.endswith(".mp4"):  # Check if the file is an MP4 file
        # Split the filename into the name part and the number part
        name_part, number_part = filename.rsplit(' - ', 1)
        # Generate a random alphanumeric string
        random_string = generate_random_string()
        # Replace the numeric code with the random string
        new_number_part = re.sub(r'\d{5}', random_string, number_part)
        # Create the new filename by combining the name part and the new number part
        new_filename = f"{name_part} - {new_number_part}"
        # Rename the file
        os.rename(os.path.join(directory_path, filename), os.path.join(directory_path, new_filename))
        print(f"Renamed '{filename}' to '{new_filename}'")
