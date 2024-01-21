$TTL    604800
@       IN      SOA     ns.example.com. admin.example.com. (
                              3         ; Serial
                         604800         ; Refresh
                          86400         ; Retry
                        2419200         ; Expire
                         604800 )       ; Negative Cache TTL
;
@       IN      NS      ns.example.com.
@       IN      A       192.0.2.1
ns      IN      A       192.0.2.2
s       IN      TXT     "aGV5eSAgRkxBR3s"
e       IN      TXT     "bm9tXw=="
c       IN      TXT     "cGFydGFnZV8="
r       IN      TXT     "ZXN0Xw=="
e       IN      TXT     "aGlkZGVu"
t       IN      TXT     "MjAyNH0="
