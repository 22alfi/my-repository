# Use Ubuntu as the base image
FROM ubuntu:20.04

# Avoid interactive prompts during apt install
ENV DEBIAN_FRONTEND=noninteractive

# Update packages and install Nginx
RUN apt update && \
    apt-get install -y nginx && \
    rm -rf /var/lib/apt/lists/*

# Expose port 80
EXPOSE 80

# Start Nginx in foreground (Docker needs this)
CMD ["nginx", "-g", "daemon off;"]
