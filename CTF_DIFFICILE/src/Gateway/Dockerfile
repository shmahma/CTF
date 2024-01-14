FROM ubuntu:latest

RUN apt-get update && \
    DEBIAN_FRONTEND=noninteractive apt-get install -y openssh-server passwd sudo

RUN sed -i 's/PermitRootLogin yes/PermitRootLogin no/' /etc/ssh/sshd_config && \
    sed -i 's/#PasswordAuthentication yes/PasswordAuthentication yes/' /etc/ssh/sshd_config && \
    sed -i 's/ChallengeResponseAuthentication no/ChallengeResponseAuthentication yes/' /etc/ssh/sshd_config

RUN useradd -m -s /bin/bash john && \
    echo "john:JoHHyDoGGyFiF@" | chpasswd && \
    echo "john ALL=(ALL) NOPASSWD: ALL" >> /etc/sudoers

COPY my_ssh_key.pub /home/john/.ssh/authorized_keys

COPY my_ssh_key_2.pub /home/john/

RUN cat /home/john/my_ssh_key_2.pub >> /home/john/.ssh/authorized_keys

RUN echo "GatewayPorts yes" >> /etc/ssh/sshd_config

RUN mkdir -p /home/john/.ssh && \
    chown -R john:john /home/john/.ssh && \
    chmod 700 /home/john/.ssh

RUN touch /home/john/.ssh/authorized_keys && \
    chmod 600 /home/john/.ssh/authorized_keys

CMD service ssh start && tail -f /dev/null
