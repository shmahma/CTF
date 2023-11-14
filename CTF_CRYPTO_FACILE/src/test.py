import string

LOWERCASE_OFFSET = ord("a")
ALPHABET = string.ascii_lowercase[:16]

def rot13_decrypt(c):
    if c in ALPHABET:
        return ALPHABET[(ord(c) - LOWERCASE_OFFSET - 13) % len(ALPHABET)]
    return c

def b16_decode(enc):
    binary_str = ""
    for c in enc:
        if c in ALPHABET:
            binary_str += "{0:04b}".format(ALPHABET.index(c))

    plain = ""
    for i in range(0, len(binary_str), 8):
        byte = binary_str[i:i+8]
        if len(byte) == 8:
            plain += chr(int(byte, 2))

    return plain

# Message chiffré à déchiffrer
encrypted_message = "cadmecepdadcpndbdceapndadmdkdkecdldgdadoebdgdmdleapnahpneadcepeddceceppndgdlebdcepdldcpnaapn"

# Déchiffrement
dec_rot13 = ''.join([rot13_decrypt(c) for c in encrypted_message])
decrypted_message = b16_decode(dec_rot13)

print("Message déchiffré:", decrypted_message)

