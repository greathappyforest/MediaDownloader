FROM debian:wheezy


RUN apt-get update && apt-get install -y --no-install-recommends\
    git wget python libav-tools apache2 php5 curl ca-certificates
RUN rm -rf /var/lib/apt/lists/*

#Install youtube-dl
RUN curl -L https://yt-dl.org/downloads/latest/youtube-dl -o /usr/local/bin/youtube-dl && chmod a+x /usr/local/bin/youtube-dl

#Install ffmpeg
RUN wget -N --no-check-certificate https://gist.githubusercontent.com/greathappyforest/7fecdf5a02d3d20cf0cfd7b1147346d9/raw/fa3741ecfc6ea987ca394464a2cd6235dbd3ac82/ffmpeg-install.sh && bash ffmpeg-install.sh

#Install avconv
RUN add-apt-repository ppa:heyarje/libav-11 && sudo apt-get update
RUN apt-get install libav-tools -y

WORKDIR /
RUN mkdir /www

WORKDIR /www
RUN git clone https://github.com/greathappyforest/MediaDownloader.git youtube-dl

WORKDIR /www/youtube-dl
RUN rm -rf .git README.md img .gitignore docker

WORKDIR /
RUN chmod -R 755 /www && chown -R www-data:www-data /www

COPY ./vhost.conf /etc/apache2/conf.d/extra/vhost.conf

RUN ln -sf /dev/stdout /var/log/apache2/youtube-dl_access.log
RUN ln -sf /dev/stderr /var/log/apache2/youtube-dl_error.log

EXPOSE 80

VOLUME /www/youtube-dl/downloads

CMD youtube-dl -U && /usr/sbin/apache2ctl -D FOREGROUND
