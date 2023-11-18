FROM ubuntu:latest

RUN apt-get update && \
    DEBIAN_FRONTEND=noninteractive apt-get install -y openssh-server passwd sudo curl

RUN sed -i 's/PermitRootLogin yes/PermitRootLogin no/' /etc/ssh/sshd_config && \
    sed -i 's/#PasswordAuthentication yes/PasswordAuthentication yes/' /etc/ssh/sshd_config && \
    sed -i 's/ChallengeResponseAuthentication no/ChallengeResponseAuthentication yes/' /etc/ssh/sshd_config

RUN useradd -m -s /bin/bash john && \
    echo "john:JoDoGGyFiF@1994" | chpasswd && \
    echo "john ALL=(ALL) NOPASSWD: /bin/tar" >> /etc/sudoers && \
    echo "{FLAG-SM:AZDDRR345GGHUY656555}" > /home/john/.flag.txt && \
    echo "This is a sample file content." > /home/john/sample_file.txt && \
    mkdir /home/john/my_directory && \
    echo "File inside my_directory." > /home/john/my_directory/my_file.txt

RUN echo "Content of flag.txt for root is not here!" > /root/flag.txt && \
    echo "{FLAG-SM:DFGR322FFGGT5332223}" > /root/.flag.txt && \
    echo "More content for root's files." > /root/more_content.txt && \
    mkdir /root/root_directory && \
    echo "File inside root_directory." > /root/root_directory/root_file.txt

CMD service ssh start && tail -f /dev/null
