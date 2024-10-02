USERNAME: admin
PASSWORD: einzweidrei

Kalau mau nambahin users harus lewat sql pakai kode ini

INSERT INTO users (username, pw) VALUES ('admin', MD5('password123'));

pastikan ada MD5

value 'admin' 'password123' bisa diubah
nama table sesuaikan sendiri yah ;)


untuk semntara kalau mau daftar masih default harus lewat mysql dulu 