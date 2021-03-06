PGDMP     5                    x         
   penggajian    12.1    12.1 }    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    16393 
   penggajian    DATABASE     �   CREATE DATABASE penggajian WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'English_United States.1252' LC_CTYPE = 'English_United States.1252';
    DROP DATABASE penggajian;
                postgres    false            �            1259    49170    anggota_kelompok_kerja    TABLE     �   CREATE TABLE public.anggota_kelompok_kerja (
    id bigint NOT NULL,
    nik character varying(10) NOT NULL,
    kelompok_kerja_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 *   DROP TABLE public.anggota_kelompok_kerja;
       public         heap    postgres    false            �            1259    49168    anggota_kelompok_kerja_id_seq    SEQUENCE     �   CREATE SEQUENCE public.anggota_kelompok_kerja_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.anggota_kelompok_kerja_id_seq;
       public          postgres    false    224            �           0    0    anggota_kelompok_kerja_id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.anggota_kelompok_kerja_id_seq OWNED BY public.anggota_kelompok_kerja.id;
          public          postgres    false    223            �            1259    41468 
   departemen    TABLE     �   CREATE TABLE public.departemen (
    kode_departemen character varying(8) NOT NULL,
    nama_departemen character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.departemen;
       public         heap    postgres    false            �            1259    41458    failed_jobs    TABLE     �   CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.failed_jobs;
       public         heap    postgres    false            �            1259    41456    failed_jobs_id_seq    SEQUENCE     {   CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.failed_jobs_id_seq;
       public          postgres    false    208            �           0    0    failed_jobs_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;
          public          postgres    false    207            �            1259    65620    gaji    TABLE     �   CREATE TABLE public.gaji (
    id bigint NOT NULL,
    nik character varying(30) NOT NULL,
    periode character varying(10) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.gaji;
       public         heap    postgres    false            �            1259    65628    gaji_details    TABLE     �   CREATE TABLE public.gaji_details (
    id bigint NOT NULL,
    gaji_id integer NOT NULL,
    kode_komponen character varying(4) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
     DROP TABLE public.gaji_details;
       public         heap    postgres    false            �            1259    65626    gaji_details_id_seq    SEQUENCE     |   CREATE SEQUENCE public.gaji_details_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.gaji_details_id_seq;
       public          postgres    false    237            �           0    0    gaji_details_id_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.gaji_details_id_seq OWNED BY public.gaji_details.id;
          public          postgres    false    236            �            1259    65618    gajis_id_seq    SEQUENCE     u   CREATE SEQUENCE public.gajis_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.gajis_id_seq;
       public          postgres    false    235            �           0    0    gajis_id_seq    SEQUENCE OWNED BY     <   ALTER SEQUENCE public.gajis_id_seq OWNED BY public.gaji.id;
          public          postgres    false    234            �            1259    41473    jabatan    TABLE       CREATE TABLE public.jabatan (
    kode_jabatan character varying(5) NOT NULL,
    nama_jabatan character varying(50) NOT NULL,
    tunjangan_jabatan integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.jabatan;
       public         heap    postgres    false            �            1259    41499    kalendar_kerja    TABLE     �   CREATE TABLE public.kalendar_kerja (
    id bigint NOT NULL,
    tanggal date NOT NULL,
    keterangan text NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 "   DROP TABLE public.kalendar_kerja;
       public         heap    postgres    false            �            1259    41497    kalendar_kerja_id_seq    SEQUENCE     ~   CREATE SEQUENCE public.kalendar_kerja_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.kalendar_kerja_id_seq;
       public          postgres    false    215            �           0    0    kalendar_kerja_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.kalendar_kerja_id_seq OWNED BY public.kalendar_kerja.id;
          public          postgres    false    214            �            1259    41478    karyawan    TABLE     7  CREATE TABLE public.karyawan (
    nik character varying(30) NOT NULL,
    nama character varying(40) NOT NULL,
    tanggal_lahir date NOT NULL,
    alamat text NOT NULL,
    tanggal_masuk date NOT NULL,
    kode_status_kawin character varying(3) NOT NULL,
    jenis_kelamin character varying(1) NOT NULL,
    foto character varying(255) NOT NULL,
    kode_jabatan character varying(5) NOT NULL,
    kode_departemen character varying(8) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    gaji_pokok integer
);
    DROP TABLE public.karyawan;
       public         heap    postgres    false            �            1259    41510 	   kehadiran    TABLE     p  CREATE TABLE public.kehadiran (
    id bigint NOT NULL,
    nik character varying(30) NOT NULL,
    tanggal_masuk timestamp(0) without time zone NOT NULL,
    tanggal_pulang timestamp(0) without time zone NOT NULL,
    kode_status_kehadiran character varying(4) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.kehadiran;
       public         heap    postgres    false            �            1259    41508    kehadirans_id_seq    SEQUENCE     z   CREATE SEQUENCE public.kehadirans_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.kehadirans_id_seq;
       public          postgres    false    217            �           0    0    kehadirans_id_seq    SEQUENCE OWNED BY     F   ALTER SEQUENCE public.kehadirans_id_seq OWNED BY public.kehadiran.id;
          public          postgres    false    216            �            1259    49162    kelompok_kerja    TABLE     �   CREATE TABLE public.kelompok_kerja (
    id bigint NOT NULL,
    kelompok_kerja character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 "   DROP TABLE public.kelompok_kerja;
       public         heap    postgres    false            �            1259    49160    kelompok_kerja_id_seq    SEQUENCE     ~   CREATE SEQUENCE public.kelompok_kerja_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.kelompok_kerja_id_seq;
       public          postgres    false    222            �           0    0    kelompok_kerja_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.kelompok_kerja_id_seq OWNED BY public.kelompok_kerja.id;
          public          postgres    false    221            �            1259    65605    komponen_gaji    TABLE     .  CREATE TABLE public.komponen_gaji (
    kode_komponen character varying(4) NOT NULL,
    nama_komponen character varying(40) NOT NULL,
    jenis character varying(255) NOT NULL,
    nilai integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 !   DROP TABLE public.komponen_gaji;
       public         heap    postgres    false            �            1259    57369    lembur_karyawan    TABLE     a  CREATE TABLE public.lembur_karyawan (
    id bigint NOT NULL,
    nik character varying(10) NOT NULL,
    tanggal_masuk timestamp(0) without time zone NOT NULL,
    tanggal_pulang timestamp(0) without time zone NOT NULL,
    durasi_lembur integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 #   DROP TABLE public.lembur_karyawan;
       public         heap    postgres    false            �            1259    57367    lembur_karyawan_id_seq    SEQUENCE        CREATE SEQUENCE public.lembur_karyawan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.lembur_karyawan_id_seq;
       public          postgres    false    232            �           0    0    lembur_karyawan_id_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.lembur_karyawan_id_seq OWNED BY public.lembur_karyawan.id;
          public          postgres    false    231            �            1259    16396 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap    postgres    false            �            1259    16394    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public          postgres    false    203            �           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public          postgres    false    202            �            1259    41449    password_resets    TABLE     �   CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);
 #   DROP TABLE public.password_resets;
       public         heap    postgres    false            �            1259    49154    pola_kerja_karyawan    TABLE     -  CREATE TABLE public.pola_kerja_karyawan (
    id bigint NOT NULL,
    pola_kerja character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    jam_masuk character varying(5) NOT NULL,
    jam_pulang character varying(5) NOT NULL
);
 '   DROP TABLE public.pola_kerja_karyawan;
       public         heap    postgres    false            �            1259    49152    pola_kerja_karyawan_id_seq    SEQUENCE     �   CREATE SEQUENCE public.pola_kerja_karyawan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.pola_kerja_karyawan_id_seq;
       public          postgres    false    220            �           0    0    pola_kerja_karyawan_id_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.pola_kerja_karyawan_id_seq OWNED BY public.pola_kerja_karyawan.id;
          public          postgres    false    219            �            1259    57346 "   pola_kerja_karyawan_kelompok_kerja    TABLE       CREATE TABLE public.pola_kerja_karyawan_kelompok_kerja (
    id bigint NOT NULL,
    nik character varying(30) NOT NULL,
    tanggal date NOT NULL,
    pola_kerja_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 6   DROP TABLE public.pola_kerja_karyawan_kelompok_kerja;
       public         heap    postgres    false            �            1259    57344 )   pola_kerja_karyawan_kelompok_kerja_id_seq    SEQUENCE     �   CREATE SEQUENCE public.pola_kerja_karyawan_kelompok_kerja_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 @   DROP SEQUENCE public.pola_kerja_karyawan_kelompok_kerja_id_seq;
       public          postgres    false    228            �           0    0 )   pola_kerja_karyawan_kelompok_kerja_id_seq    SEQUENCE OWNED BY     w   ALTER SEQUENCE public.pola_kerja_karyawan_kelompok_kerja_id_seq OWNED BY public.pola_kerja_karyawan_kelompok_kerja.id;
          public          postgres    false    227            �            1259    49186    pola_kerja_kelompok_karyawan    TABLE       CREATE TABLE public.pola_kerja_kelompok_karyawan (
    id bigint NOT NULL,
    tanggal date NOT NULL,
    pola_kerja_id integer NOT NULL,
    kelompok_kerja_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 0   DROP TABLE public.pola_kerja_kelompok_karyawan;
       public         heap    postgres    false            �            1259    49184 #   pola_kerja_kelompok_karyawan_id_seq    SEQUENCE     �   CREATE SEQUENCE public.pola_kerja_kelompok_karyawan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 :   DROP SEQUENCE public.pola_kerja_kelompok_karyawan_id_seq;
       public          postgres    false    226            �           0    0 #   pola_kerja_kelompok_karyawan_id_seq    SEQUENCE OWNED BY     k   ALTER SEQUENCE public.pola_kerja_kelompok_karyawan_id_seq OWNED BY public.pola_kerja_kelompok_karyawan.id;
          public          postgres    false    225            �            1259    41488    setting_perusahaan    TABLE     7  CREATE TABLE public.setting_perusahaan (
    id bigint NOT NULL,
    nama_perusahaan character varying(50) NOT NULL,
    alamat_perusahaan character varying(100) NOT NULL,
    no_telpon character varying(255) NOT NULL,
    logo character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    deskripsi_perusahaan character varying(255) NOT NULL,
    jenis_perusahaan character varying(255) NOT NULL,
    bentuk_perusahaan character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 &   DROP TABLE public.setting_perusahaan;
       public         heap    postgres    false            �            1259    41486    setting_perusahaan_id_seq    SEQUENCE     �   CREATE SEQUENCE public.setting_perusahaan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.setting_perusahaan_id_seq;
       public          postgres    false    213            �           0    0    setting_perusahaan_id_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public.setting_perusahaan_id_seq OWNED BY public.setting_perusahaan.id;
          public          postgres    false    212            �            1259    41525    status_kawin    TABLE     �   CREATE TABLE public.status_kawin (
    kode_status_kawin character varying(255) NOT NULL,
    keterangan character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
     DROP TABLE public.status_kawin;
       public         heap    postgres    false            �            1259    57354    table_status_kehadiran    TABLE     �   CREATE TABLE public.table_status_kehadiran (
    kode_status_kehadiran character varying(255) NOT NULL,
    status_kehadiran character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 *   DROP TABLE public.table_status_kehadiran;
       public         heap    postgres    false            �            1259    41438    users    TABLE     x  CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.users;
       public         heap    postgres    false            �            1259    41436    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public          postgres    false    205            �           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public          postgres    false    204            �            1259    57362    view_riwayat_kehadiran    VIEW       CREATE VIEW public.view_riwayat_kehadiran AS
 SELECT k.id,
    k.nik,
    k.tanggal_masuk,
    k.tanggal_pulang,
    pk.pola_kerja,
    pk.jam_masuk,
    pk.jam_pulang
   FROM (((public.kehadiran k
     JOIN public.table_status_kehadiran sk ON (((k.kode_status_kehadiran)::text = (sk.kode_status_kehadiran)::text)))
     LEFT JOIN public.pola_kerja_karyawan_kelompok_kerja pkk ON ((((pkk.nik)::text = (k.nik)::text) AND (date(k.tanggal_masuk) = pkk.tanggal))))
     LEFT JOIN public.pola_kerja_karyawan pk ON ((pk.id = pkk.pola_kerja_id)));
 )   DROP VIEW public.view_riwayat_kehadiran;
       public          postgres    false    217    228    220    220    220    220    217    217    217    217    229    228    228            �
           2604    49173    anggota_kelompok_kerja id    DEFAULT     �   ALTER TABLE ONLY public.anggota_kelompok_kerja ALTER COLUMN id SET DEFAULT nextval('public.anggota_kelompok_kerja_id_seq'::regclass);
 H   ALTER TABLE public.anggota_kelompok_kerja ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    224    223    224            �
           2604    41461    failed_jobs id    DEFAULT     p   ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);
 =   ALTER TABLE public.failed_jobs ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    208    207    208                       2604    65623    gaji id    DEFAULT     c   ALTER TABLE ONLY public.gaji ALTER COLUMN id SET DEFAULT nextval('public.gajis_id_seq'::regclass);
 6   ALTER TABLE public.gaji ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    234    235    235                       2604    65631    gaji_details id    DEFAULT     r   ALTER TABLE ONLY public.gaji_details ALTER COLUMN id SET DEFAULT nextval('public.gaji_details_id_seq'::regclass);
 >   ALTER TABLE public.gaji_details ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    237    236    237            �
           2604    41502    kalendar_kerja id    DEFAULT     v   ALTER TABLE ONLY public.kalendar_kerja ALTER COLUMN id SET DEFAULT nextval('public.kalendar_kerja_id_seq'::regclass);
 @   ALTER TABLE public.kalendar_kerja ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    215    214    215            �
           2604    41513    kehadiran id    DEFAULT     m   ALTER TABLE ONLY public.kehadiran ALTER COLUMN id SET DEFAULT nextval('public.kehadirans_id_seq'::regclass);
 ;   ALTER TABLE public.kehadiran ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    217    216    217            �
           2604    49165    kelompok_kerja id    DEFAULT     v   ALTER TABLE ONLY public.kelompok_kerja ALTER COLUMN id SET DEFAULT nextval('public.kelompok_kerja_id_seq'::regclass);
 @   ALTER TABLE public.kelompok_kerja ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    221    222    222                       2604    57372    lembur_karyawan id    DEFAULT     x   ALTER TABLE ONLY public.lembur_karyawan ALTER COLUMN id SET DEFAULT nextval('public.lembur_karyawan_id_seq'::regclass);
 A   ALTER TABLE public.lembur_karyawan ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    231    232    232            �
           2604    16399    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    202    203    203            �
           2604    49157    pola_kerja_karyawan id    DEFAULT     �   ALTER TABLE ONLY public.pola_kerja_karyawan ALTER COLUMN id SET DEFAULT nextval('public.pola_kerja_karyawan_id_seq'::regclass);
 E   ALTER TABLE public.pola_kerja_karyawan ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    220    219    220                        2604    57349 %   pola_kerja_karyawan_kelompok_kerja id    DEFAULT     �   ALTER TABLE ONLY public.pola_kerja_karyawan_kelompok_kerja ALTER COLUMN id SET DEFAULT nextval('public.pola_kerja_karyawan_kelompok_kerja_id_seq'::regclass);
 T   ALTER TABLE public.pola_kerja_karyawan_kelompok_kerja ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    227    228    228            �
           2604    49189    pola_kerja_kelompok_karyawan id    DEFAULT     �   ALTER TABLE ONLY public.pola_kerja_kelompok_karyawan ALTER COLUMN id SET DEFAULT nextval('public.pola_kerja_kelompok_karyawan_id_seq'::regclass);
 N   ALTER TABLE public.pola_kerja_kelompok_karyawan ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    225    226    226            �
           2604    41491    setting_perusahaan id    DEFAULT     ~   ALTER TABLE ONLY public.setting_perusahaan ALTER COLUMN id SET DEFAULT nextval('public.setting_perusahaan_id_seq'::regclass);
 D   ALTER TABLE public.setting_perusahaan ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    212    213    213            �
           2604    41441    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    205    204    205            �          0    49170    anggota_kelompok_kerja 
   TABLE DATA           d   COPY public.anggota_kelompok_kerja (id, nik, kelompok_kerja_id, created_at, updated_at) FROM stdin;
    public          postgres    false    224   q�       �          0    41468 
   departemen 
   TABLE DATA           ^   COPY public.departemen (kode_departemen, nama_departemen, created_at, updated_at) FROM stdin;
    public          postgres    false    209   ��       �          0    41458    failed_jobs 
   TABLE DATA           [   COPY public.failed_jobs (id, connection, queue, payload, exception, failed_at) FROM stdin;
    public          postgres    false    208   H�       �          0    65620    gaji 
   TABLE DATA           H   COPY public.gaji (id, nik, periode, created_at, updated_at) FROM stdin;
    public          postgres    false    235   e�       �          0    65628    gaji_details 
   TABLE DATA           Z   COPY public.gaji_details (id, gaji_id, kode_komponen, created_at, updated_at) FROM stdin;
    public          postgres    false    237   
�       �          0    41473    jabatan 
   TABLE DATA           h   COPY public.jabatan (kode_jabatan, nama_jabatan, tunjangan_jabatan, created_at, updated_at) FROM stdin;
    public          postgres    false    210   ]�       �          0    41499    kalendar_kerja 
   TABLE DATA           Y   COPY public.kalendar_kerja (id, tanggal, keterangan, created_at, updated_at) FROM stdin;
    public          postgres    false    215   H�       �          0    41478    karyawan 
   TABLE DATA           �   COPY public.karyawan (nik, nama, tanggal_lahir, alamat, tanggal_masuk, kode_status_kawin, jenis_kelamin, foto, kode_jabatan, kode_departemen, created_at, updated_at, gaji_pokok) FROM stdin;
    public          postgres    false    211   ��       �          0    41510 	   kehadiran 
   TABLE DATA           z   COPY public.kehadiran (id, nik, tanggal_masuk, tanggal_pulang, kode_status_kehadiran, created_at, updated_at) FROM stdin;
    public          postgres    false    217   s�       �          0    49162    kelompok_kerja 
   TABLE DATA           T   COPY public.kelompok_kerja (id, kelompok_kerja, created_at, updated_at) FROM stdin;
    public          postgres    false    222   ҥ       �          0    65605    komponen_gaji 
   TABLE DATA           k   COPY public.komponen_gaji (kode_komponen, nama_komponen, jenis, nilai, created_at, updated_at) FROM stdin;
    public          postgres    false    233   S�       �          0    57369    lembur_karyawan 
   TABLE DATA           x   COPY public.lembur_karyawan (id, nik, tanggal_masuk, tanggal_pulang, durasi_lembur, created_at, updated_at) FROM stdin;
    public          postgres    false    232   :�       �          0    16396 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public          postgres    false    203   §       �          0    41449    password_resets 
   TABLE DATA           C   COPY public.password_resets (email, token, created_at) FROM stdin;
    public          postgres    false    206   ũ       �          0    49154    pola_kerja_karyawan 
   TABLE DATA           l   COPY public.pola_kerja_karyawan (id, pola_kerja, created_at, updated_at, jam_masuk, jam_pulang) FROM stdin;
    public          postgres    false    220   �       �          0    57346 "   pola_kerja_karyawan_kelompok_kerja 
   TABLE DATA           u   COPY public.pola_kerja_karyawan_kelompok_kerja (id, nik, tanggal, pola_kerja_id, created_at, updated_at) FROM stdin;
    public          postgres    false    228   ��       �          0    49186    pola_kerja_kelompok_karyawan 
   TABLE DATA           }   COPY public.pola_kerja_kelompok_karyawan (id, tanggal, pola_kerja_id, kelompok_kerja_id, created_at, updated_at) FROM stdin;
    public          postgres    false    226   ��       �          0    41488    setting_perusahaan 
   TABLE DATA           �   COPY public.setting_perusahaan (id, nama_perusahaan, alamat_perusahaan, no_telpon, logo, email, deskripsi_perusahaan, jenis_perusahaan, bentuk_perusahaan, created_at, updated_at) FROM stdin;
    public          postgres    false    213   Q�       �          0    41525    status_kawin 
   TABLE DATA           ]   COPY public.status_kawin (kode_status_kawin, keterangan, created_at, updated_at) FROM stdin;
    public          postgres    false    218   �       �          0    57354    table_status_kehadiran 
   TABLE DATA           q   COPY public.table_status_kehadiran (kode_status_kehadiran, status_kehadiran, created_at, updated_at) FROM stdin;
    public          postgres    false    229   Ю       �          0    41438    users 
   TABLE DATA           u   COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) FROM stdin;
    public          postgres    false    205   �       �           0    0    anggota_kelompok_kerja_id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.anggota_kelompok_kerja_id_seq', 43, true);
          public          postgres    false    223            �           0    0    failed_jobs_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);
          public          postgres    false    207            �           0    0    gaji_details_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.gaji_details_id_seq', 9, true);
          public          postgres    false    236            �           0    0    gajis_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.gajis_id_seq', 28, true);
          public          postgres    false    234            �           0    0    kalendar_kerja_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.kalendar_kerja_id_seq', 6, true);
          public          postgres    false    214            �           0    0    kehadirans_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.kehadirans_id_seq', 63, true);
          public          postgres    false    216            �           0    0    kelompok_kerja_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.kelompok_kerja_id_seq', 3, true);
          public          postgres    false    221            �           0    0    lembur_karyawan_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.lembur_karyawan_id_seq', 13, true);
          public          postgres    false    231            �           0    0    migrations_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.migrations_id_seq', 105, true);
          public          postgres    false    202            �           0    0    pola_kerja_karyawan_id_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.pola_kerja_karyawan_id_seq', 12, true);
          public          postgres    false    219            �           0    0 )   pola_kerja_karyawan_kelompok_kerja_id_seq    SEQUENCE SET     Z   SELECT pg_catalog.setval('public.pola_kerja_karyawan_kelompok_kerja_id_seq', 1935, true);
          public          postgres    false    227            �           0    0 #   pola_kerja_kelompok_karyawan_id_seq    SEQUENCE SET     S   SELECT pg_catalog.setval('public.pola_kerja_kelompok_karyawan_id_seq', 794, true);
          public          postgres    false    225            �           0    0    setting_perusahaan_id_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.setting_perusahaan_id_seq', 1, false);
          public          postgres    false    212            �           0    0    users_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.users_id_seq', 2, true);
          public          postgres    false    204                        2606    49175 2   anggota_kelompok_kerja anggota_kelompok_kerja_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public.anggota_kelompok_kerja
    ADD CONSTRAINT anggota_kelompok_kerja_pkey PRIMARY KEY (id);
 \   ALTER TABLE ONLY public.anggota_kelompok_kerja DROP CONSTRAINT anggota_kelompok_kerja_pkey;
       public            postgres    false    224                       2606    41472    departemen departemen_pkey 
   CONSTRAINT     e   ALTER TABLE ONLY public.departemen
    ADD CONSTRAINT departemen_pkey PRIMARY KEY (kode_departemen);
 D   ALTER TABLE ONLY public.departemen DROP CONSTRAINT departemen_pkey;
       public            postgres    false    209                       2606    41467    failed_jobs failed_jobs_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_pkey;
       public            postgres    false    208            .           2606    65633    gaji_details gaji_details_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.gaji_details
    ADD CONSTRAINT gaji_details_pkey PRIMARY KEY (id);
 H   ALTER TABLE ONLY public.gaji_details DROP CONSTRAINT gaji_details_pkey;
       public            postgres    false    237            ,           2606    65625    gaji gajis_pkey 
   CONSTRAINT     M   ALTER TABLE ONLY public.gaji
    ADD CONSTRAINT gajis_pkey PRIMARY KEY (id);
 9   ALTER TABLE ONLY public.gaji DROP CONSTRAINT gajis_pkey;
       public            postgres    false    235                       2606    41477    jabatan jabatan_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.jabatan
    ADD CONSTRAINT jabatan_pkey PRIMARY KEY (kode_jabatan);
 >   ALTER TABLE ONLY public.jabatan DROP CONSTRAINT jabatan_pkey;
       public            postgres    false    210                       2606    41507 "   kalendar_kerja kalendar_kerja_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.kalendar_kerja
    ADD CONSTRAINT kalendar_kerja_pkey PRIMARY KEY (id);
 L   ALTER TABLE ONLY public.kalendar_kerja DROP CONSTRAINT kalendar_kerja_pkey;
       public            postgres    false    215                       2606    41485    karyawan karyawan_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY public.karyawan
    ADD CONSTRAINT karyawan_pkey PRIMARY KEY (nik);
 @   ALTER TABLE ONLY public.karyawan DROP CONSTRAINT karyawan_pkey;
       public            postgres    false    211                       2606    41515    kehadiran kehadirans_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY public.kehadiran
    ADD CONSTRAINT kehadirans_pkey PRIMARY KEY (id);
 C   ALTER TABLE ONLY public.kehadiran DROP CONSTRAINT kehadirans_pkey;
       public            postgres    false    217                       2606    49167 "   kelompok_kerja kelompok_kerja_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.kelompok_kerja
    ADD CONSTRAINT kelompok_kerja_pkey PRIMARY KEY (id);
 L   ALTER TABLE ONLY public.kelompok_kerja DROP CONSTRAINT kelompok_kerja_pkey;
       public            postgres    false    222            *           2606    65609     komponen_gaji komponen_gaji_pkey 
   CONSTRAINT     i   ALTER TABLE ONLY public.komponen_gaji
    ADD CONSTRAINT komponen_gaji_pkey PRIMARY KEY (kode_komponen);
 J   ALTER TABLE ONLY public.komponen_gaji DROP CONSTRAINT komponen_gaji_pkey;
       public            postgres    false    233            (           2606    57374 $   lembur_karyawan lembur_karyawan_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.lembur_karyawan
    ADD CONSTRAINT lembur_karyawan_pkey PRIMARY KEY (id);
 N   ALTER TABLE ONLY public.lembur_karyawan DROP CONSTRAINT lembur_karyawan_pkey;
       public            postgres    false    232                       2606    16401    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public            postgres    false    203            $           2606    57351 J   pola_kerja_karyawan_kelompok_kerja pola_kerja_karyawan_kelompok_kerja_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.pola_kerja_karyawan_kelompok_kerja
    ADD CONSTRAINT pola_kerja_karyawan_kelompok_kerja_pkey PRIMARY KEY (id);
 t   ALTER TABLE ONLY public.pola_kerja_karyawan_kelompok_kerja DROP CONSTRAINT pola_kerja_karyawan_kelompok_kerja_pkey;
       public            postgres    false    228                       2606    49159 ,   pola_kerja_karyawan pola_kerja_karyawan_pkey 
   CONSTRAINT     j   ALTER TABLE ONLY public.pola_kerja_karyawan
    ADD CONSTRAINT pola_kerja_karyawan_pkey PRIMARY KEY (id);
 V   ALTER TABLE ONLY public.pola_kerja_karyawan DROP CONSTRAINT pola_kerja_karyawan_pkey;
       public            postgres    false    220            "           2606    49191 >   pola_kerja_kelompok_karyawan pola_kerja_kelompok_karyawan_pkey 
   CONSTRAINT     |   ALTER TABLE ONLY public.pola_kerja_kelompok_karyawan
    ADD CONSTRAINT pola_kerja_kelompok_karyawan_pkey PRIMARY KEY (id);
 h   ALTER TABLE ONLY public.pola_kerja_kelompok_karyawan DROP CONSTRAINT pola_kerja_kelompok_karyawan_pkey;
       public            postgres    false    226                       2606    41496 *   setting_perusahaan setting_perusahaan_pkey 
   CONSTRAINT     h   ALTER TABLE ONLY public.setting_perusahaan
    ADD CONSTRAINT setting_perusahaan_pkey PRIMARY KEY (id);
 T   ALTER TABLE ONLY public.setting_perusahaan DROP CONSTRAINT setting_perusahaan_pkey;
       public            postgres    false    213                       2606    41532    status_kawin status_kawin_pkey 
   CONSTRAINT     k   ALTER TABLE ONLY public.status_kawin
    ADD CONSTRAINT status_kawin_pkey PRIMARY KEY (kode_status_kawin);
 H   ALTER TABLE ONLY public.status_kawin DROP CONSTRAINT status_kawin_pkey;
       public            postgres    false    218            &           2606    57361 2   table_status_kehadiran table_status_kehadiran_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.table_status_kehadiran
    ADD CONSTRAINT table_status_kehadiran_pkey PRIMARY KEY (kode_status_kehadiran);
 \   ALTER TABLE ONLY public.table_status_kehadiran DROP CONSTRAINT table_status_kehadiran_pkey;
       public            postgres    false    229                       2606    41448    users users_email_unique 
   CONSTRAINT     T   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_email_unique;
       public            postgres    false    205            	           2606    41446    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    205            
           1259    41455    password_resets_email_index    INDEX     X   CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);
 /   DROP INDEX public.password_resets_email_index;
       public            postgres    false    206            �   @   x�34�4413500��4��".CC���1L�*fd�3���"��`b�p�L`v#�b���� ���      �   w   x�s	000�tI-H,*I�M�SI�����O��4202�50�52T00�2��21�&��4�����Ҽ���b3,�L����0F6�3/-�(hnY"d�kh�`hhedae`����� �6A      �      x������ � �      �   �   x�]��	!Dѵ���$^�3�)���j�6���b�[Zy�ߩ��w?�ɽ��;�=�뽏���g�~����g��]����b1t�z�A���q3l�F0!n%n#�EpReh���I�a�*�$U��ϯ�� ��	      �   C   x�3�44������".NC3 7��7�B��\3�jל��I��!���Y�y�0�b���� Ǎ�      �   �   x�u��J1E�/_�yyI&��:"V�E]�	m:>�dJ&�{ǀM���=\����y�Ync��]�k���C�HI4^��[LlV��m	��||u�m��j���~��K�aaP�28O�Ū���)�P�,�����#j.q޺������3r8��꘿�^���\|����-���Su�H�����W���T�B	�Z+�W��ne��J�e�j;      �   �   x�m�;�0D��)|� #�%TH���f-,a�8�ߟ�����igvfx�)�--W��L�������y����`�0�%�L��݋5��8r�q��g7��Lh��|��j�k2�J������.��{�ٌ˕R�"�Ơ��+����:-��6� �V�      �   m  x�}��n�0���S�䱓@|GU��$Բ���LK��$1�A]��w�@ �-(���?�~�Ť���w� ���=fc>+��)ya9Lo�����.��;l�3,&������\ [�W����.a��BHv�r���$p� Р5�դ��E�a�o-�ؽ�K��UC��fc��:ک'�!��'�_��+�~���o_i�'�l=l�^R���n��ļ�q�9��@�eH��];a�����
��_���v�S�C3O��Xt�zσ�M���k�7%�W���fv���/�?6�>�'﷨�2�PC|�
��b��؋y���%��zI�V`kSȯ��/��m���u0r��\rI7� H�K.�)p9�P	�`�"'.
/lg֊p�v����g����lbs�:'���˯Á�jʽ���!�I�&�kCj8R?���k�sL$[l7ۄ&^R��`�-ށ}���\m$-��55�2L��4�!�{�i榲�=����!�s��	=-D�{G�{K���{fue��#g�J���50+��h�_�U�Y�6ݑ�-N�V&����N��2�n�7W$5L�:��v唪����{<���}V�      �   O  x���M��0F��)r�Lْ����l�}�s4=EB
��P�J�^0ߓMJ�k5�2n�%?�<r��1�\��������r�"��i�O�E��r���յW��S�]�߭�^�g��3?�2ݳ�e��RiOz�H�U�nU���I��tX���}�>�t�Hv��Ry���r�8O��y/��޷g�X3[��̎o�]������+�F��*��l����Bo�^�^9:�����u�Z��z���z��_t�\����@�+�	'���]3���W��+��>~~_y�t������ӿ����~8��t��;O���@g|zg������gts�����38��ܨ�t�3�X��O� Ug,�g\��ie����t:�����N'��3�3>]��
����iV�Z2g*8Sg|:}7Vp��������O��Lgj��O���
����>�3�i�3Ef�TK5�3�i�3�@��i�3] ��4ߙ��:W���3��p�7p�۲�P-�
�vH���t���� U�N��!������!����iV�:�T��
j�ѬHu��zt����0U�N�: ����iV�:�T�ן��7X�C<      �   q   x�e�1�0 �9~�?��)����ұK$(�hm����.����ne�ne�k��[`b�đ�4��y7�)a"eQ:���.8<^VWċMޖo��b?�ٟ��u�D���2�x��,#Y      �   �   x�mпn�0��~
�@ѝ���]��HQ��rC�TN����a �$����٥�(|���vq~gG��	>������R&K_MêjB{�ӌ3�8�O�����f܎c����o�BA���B$�!�������5�s���#k	�2�m�V�[��͕xx��3���BG��^nd�GQ7}����I�<�y�����S&+)�?0�wx      �   x   x�}��1�Ii hw�\EP��_�I�-$�F�=�1 �$�����d��#��=y���5�?*M�UU�*���e��eI�r��f�+3{����y�-�w��"枷���ZM       �   �  x����n�0���YŹ��]V�̒Nn#����!$mW���F�|�ϱ���s��x���c��6<p�a��c��>��|�TifjAy������Y��5,����r̘\	�������/a1c��8ϭߟ��Z��L�>�T@�+�����d~Hn�%W�+�����^g[(#��)>��⥦Pj/$�{����4�il���8�8	�	�ܫ�E(��M���JZzM�RCC�Z\|�;fm�!B;!ޱ��E]�Ʌre�kĸ��C��6���Mpf�%{#
���<�g�߂`��T�Z�y|�}is��(V)���&?o1+Y�d.���S�)%�n�9�J)�D+��%��_:������	��/�fN�5��y~i�Ü�Q
�Z��G���e�����yal���,~&-����1a���D���		N����Ӛ����iU�U���#}���"�#�] ��o����t��*�����>0��      �      x������ � �      �   �   x�uѱ�0��}���swm���bbb����DT�0��K�A@�^z_���*�ս�Sx�(ʦj ��ބv�S��6Bn���Љ��bD�u6��� ����x	�W�G��܏`Q��.v�V
��hY��"s	'���|���m�^���fc^�^�iߚ��2m�i�{��_���e�0������;��p5k�      �   �  x�m��m1��L.6Hj��$����b��-@ЩOO(�yƕϚW���_�׾^?�s�y�&�lL,�3`p|�0��s���L�� �.9A2]r�d���t�	��$�%H�K.�L�\ Y.�@�\r�d���r���$�%H�K.�,�� Y.�A�\r��p���%�����0�=a��{������S��ނ�S���S���S���S��9h��l��l��l��l��l��l�$[�ɖ�@��/�l�$[�ɖ�@��/�l�$[�I�_���$=Hz�
��� ��+������������Q+N�	�΂�S瀁S��9��� ��+A��W���I�_	���
$=Hz�*���U ���@��W���I�_���
$=Hz� �� �� �� �� �� i�������4�      �   �   x��ұ�0D�ښ"8 )[$3K��#@���4P��r]GX�i�4?����a�����u+�.����i)�a�JKS�%L]i�T��0���׶�T�jJir�)�ɡ��&��R�j�m��J�j��j*i
���)������J�j*i
���)������Z{@M-M5�njji�PSK�d���1��OAP      �   �   x�U�A�0�u9ſ �P!�+%��$����G�~)ԴOo�Jw3�̋Y��a�m������ܰ���o8�Q���s���2.S��4��Ș6�D��bx��F�����L&��tt1��s��`�[�[�#h�7)��ҋ��;ܡ��>��X���+����\�\B,��LDp�� � B�C      �   �   x���1�0E���ir��SٺXjLi�6�AP%U$���s�J@��tg�SG�;�xG^����k���o<0�P��]
�iDC�-�$L�0Pv|�J��vñ��J��L�2B[o�~huIA��)��@E����A*z�8)���Wf�����Wɤ      �   9   x�s�tL*N���".ONϪL'�381;�����HL�,��9�KK2��=... ��j      �   �   x���Ao�0�������گ�(��&���fN��`I�5��^���b���$o���7�Jc�/�2�"guR(���s���VT��d�*�K��z��͋2��|�����n� ��3]������S!��"���A�D����QF-j[tb��9C�W3����k�/?�o����\YV?��#��2�,�`.�YtΒ���Z��x�v^1�#�;�Xy     