FROM nginx:1.27.3-alpine AS production

COPY nginx.conf /etc/nginx/nginx.conf
COPY mime.types /etc/nginx/mime.types
WORKDIR /usr/share/nginx/html


EXPOSE 80
EXPOSE 443
EXPOSE 6033
EXPOSE 6034
CMD ["nginx", "-g", "daemon off;"]