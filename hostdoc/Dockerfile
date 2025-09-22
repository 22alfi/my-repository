# Use the official lightweight Python 3.11-slim image
FROM python:3.11-slim

# Set the working directory inside the container
WORKDIR /app

COPY requirements.txt .


# Install dependencies
RUN pip install --no-cache-dir -r requirements.txt

# Copy the rest of the application code
COPY . .

# Expose the port your application listens on (if applicable)
EXPOSE 5000

# Command to run the application when the container starts
CMD ["python3", "app.py"]
