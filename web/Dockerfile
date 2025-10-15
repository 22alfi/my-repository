# Use official nginx image as base
FROM nginx:latest

# Remove the default nginx index page
RUN rm -rf /usr/share/nginx/html/*

# Copy your website files into nginx html directory
COPY . /usr/share/nginx/html

# Expose port 80 to outside world
EXPOSE 80

# Start nginx automatically
CMD ["nginx", "-g", "daemon off;"]
