--
-- PostgreSQL database dump
--

-- Dumped from database version 11.1
-- Dumped by pg_dump version 11.1

-- Started on 2019-05-30 22:55:17

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 3 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA public;


--
-- TOC entry 2217 (class 0 OID 0)
-- Dependencies: 3
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON SCHEMA public IS 'standard public schema';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 200 (class 1259 OID 24997)
-- Name: client; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.client (
    idclient integer NOT NULL,
    nom text NOT NULL,
    prenom text NOT NULL,
    mail text NOT NULL,
    mdp text NOT NULL
);


--
-- TOC entry 199 (class 1259 OID 24995)
-- Name: client_idclient_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.client_idclient_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2218 (class 0 OID 0)
-- Dependencies: 199
-- Name: client_idclient_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.client_idclient_seq OWNED BY public.client.idclient;


--
-- TOC entry 198 (class 1259 OID 24984)
-- Name: commande; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.commande (
    idclient integer NOT NULL,
    montant integer NOT NULL,
    taille text,
    narticle text NOT NULL
);


--
-- TOC entry 196 (class 1259 OID 24978)
-- Name: commande_idclient_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.commande_idclient_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2219 (class 0 OID 0)
-- Dependencies: 196
-- Name: commande_idclient_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.commande_idclient_seq OWNED BY public.commande.idclient;


--
-- TOC entry 197 (class 1259 OID 24982)
-- Name: commande_montant_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.commande_montant_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2220 (class 0 OID 0)
-- Dependencies: 197
-- Name: commande_montant_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.commande_montant_seq OWNED BY public.commande.montant;


--
-- TOC entry 203 (class 1259 OID 25010)
-- Name: panier; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.panier (
    idclient integer NOT NULL,
    narticle text NOT NULL,
    prix integer NOT NULL,
    taille text NOT NULL
);


--
-- TOC entry 201 (class 1259 OID 25006)
-- Name: panier_idclient_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.panier_idclient_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2221 (class 0 OID 0)
-- Dependencies: 201
-- Name: panier_idclient_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.panier_idclient_seq OWNED BY public.panier.idclient;


--
-- TOC entry 202 (class 1259 OID 25008)
-- Name: panier_prix_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.panier_prix_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2222 (class 0 OID 0)
-- Dependencies: 202
-- Name: panier_prix_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.panier_prix_seq OWNED BY public.panier.prix;


--
-- TOC entry 205 (class 1259 OID 25022)
-- Name: stockarticle; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.stockarticle (
    narticle text NOT NULL,
    stock integer NOT NULL,
    categorie text NOT NULL,
    prix integer,
    id integer NOT NULL
);


--
-- TOC entry 206 (class 1259 OID 33173)
-- Name: stockarticle_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.stockarticle_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2223 (class 0 OID 0)
-- Dependencies: 206
-- Name: stockarticle_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.stockarticle_id_seq OWNED BY public.stockarticle.id;


--
-- TOC entry 204 (class 1259 OID 25020)
-- Name: stockarticle_stock_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.stockarticle_stock_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2224 (class 0 OID 0)
-- Dependencies: 204
-- Name: stockarticle_stock_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.stockarticle_stock_seq OWNED BY public.stockarticle.stock;


--
-- TOC entry 2069 (class 2604 OID 25000)
-- Name: client idclient; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.client ALTER COLUMN idclient SET DEFAULT nextval('public.client_idclient_seq'::regclass);


--
-- TOC entry 2067 (class 2604 OID 24987)
-- Name: commande idclient; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.commande ALTER COLUMN idclient SET DEFAULT nextval('public.commande_idclient_seq'::regclass);


--
-- TOC entry 2068 (class 2604 OID 24989)
-- Name: commande montant; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.commande ALTER COLUMN montant SET DEFAULT nextval('public.commande_montant_seq'::regclass);


--
-- TOC entry 2070 (class 2604 OID 25013)
-- Name: panier idclient; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.panier ALTER COLUMN idclient SET DEFAULT nextval('public.panier_idclient_seq'::regclass);


--
-- TOC entry 2071 (class 2604 OID 25014)
-- Name: panier prix; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.panier ALTER COLUMN prix SET DEFAULT nextval('public.panier_prix_seq'::regclass);


--
-- TOC entry 2072 (class 2604 OID 25025)
-- Name: stockarticle stock; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.stockarticle ALTER COLUMN stock SET DEFAULT nextval('public.stockarticle_stock_seq'::regclass);


--
-- TOC entry 2073 (class 2604 OID 33175)
-- Name: stockarticle id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.stockarticle ALTER COLUMN id SET DEFAULT nextval('public.stockarticle_id_seq'::regclass);


--
-- TOC entry 2205 (class 0 OID 24997)
-- Dependencies: 200
-- Data for Name: client; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.client VALUES (17, 'Roland', 'Aurelie', 'aurelieroland@hotmail.com', 'MDP');
INSERT INTO public.client VALUES (18, 'Louis', 'Alan', 'alanlouis@hotmail.com', 'MDP');


--
-- TOC entry 2203 (class 0 OID 24984)
-- Dependencies: 198
-- Data for Name: commande; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.commande VALUES (17, 17, 'xs', 'VE10');
INSERT INTO public.commande VALUES (17, 17, 'xs', 'VE10');
INSERT INTO public.commande VALUES (17, 17, 'xs', 'VE10');
INSERT INTO public.commande VALUES (17, 17, 'xs', 'VE10');
INSERT INTO public.commande VALUES (17, 17, 'xs', 'VE10');
INSERT INTO public.commande VALUES (17, 17, 'xs', 'VE10');
INSERT INTO public.commande VALUES (17, 17, 'xs', 'VE10');
INSERT INTO public.commande VALUES (17, 17, 'xs', 'VE10');
INSERT INTO public.commande VALUES (17, 17, 'xs', 'VE10');
INSERT INTO public.commande VALUES (17, 17, 'xs', 'VE10');
INSERT INTO public.commande VALUES (17, 17, 'xs', 'VE10');
INSERT INTO public.commande VALUES (17, 85, 'L', 'VF3');
INSERT INTO public.commande VALUES (17, 15, 'M', 'VH2');
INSERT INTO public.commande VALUES (17, 25, '0', 'DVD16');
INSERT INTO public.commande VALUES (17, 25, '0', 'DVD16');
INSERT INTO public.commande VALUES (17, 10, '0', 'B1');
INSERT INTO public.commande VALUES (17, 15, '0', 'B2');


--
-- TOC entry 2208 (class 0 OID 25010)
-- Dependencies: 203
-- Data for Name: panier; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.panier VALUES (18, 'VH6', 41, 'L');
INSERT INTO public.panier VALUES (17, 'B1', 10, '0');


--
-- TOC entry 2210 (class 0 OID 25022)
-- Dependencies: 205
-- Data for Name: stockarticle; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.stockarticle VALUES ('B3', 12, 'Autres
', 17, 2);
INSERT INTO public.stockarticle VALUES ('B4', 4, 'Autres', 2, 3);
INSERT INTO public.stockarticle VALUES ('B5', 14, 'Autres', 50, 4);
INSERT INTO public.stockarticle VALUES ('B6', 25, 'Autres', 57, 5);
INSERT INTO public.stockarticle VALUES ('B7', 30, 'Autres', 18, 6);
INSERT INTO public.stockarticle VALUES ('B8', 14, 'Autres', 8, 7);
INSERT INTO public.stockarticle VALUES ('B9
', 15, 'Autres', 27, 8);
INSERT INTO public.stockarticle VALUES ('B10', 74, 'Autres', 40, 9);
INSERT INTO public.stockarticle VALUES ('B11', 120, 'Autres', 85, 10);
INSERT INTO public.stockarticle VALUES ('B12', 45, 'Autres', 95, 11);
INSERT INTO public.stockarticle VALUES ('B13', 2, 'Autres', 120, 12);
INSERT INTO public.stockarticle VALUES ('B14', 85, 'Autres', 84, 13);
INSERT INTO public.stockarticle VALUES ('B15', 75, 'Autres', 12, 14);
INSERT INTO public.stockarticle VALUES ('B16', 18, 'Autres', 200, 15);
INSERT INTO public.stockarticle VALUES ('DVD1', 41, 'Autres', 15, 16);
INSERT INTO public.stockarticle VALUES ('DVD2', 15, 'Autres', 15, 17);
INSERT INTO public.stockarticle VALUES ('DVD3', 14, 'Autres', 15, 18);
INSERT INTO public.stockarticle VALUES ('DVD4', 15, 'Autres', 15, 19);
INSERT INTO public.stockarticle VALUES ('DVD5', 18, 'Autres', 15, 20);
INSERT INTO public.stockarticle VALUES ('DVD6', 17, 'Autres', 15, 21);
INSERT INTO public.stockarticle VALUES ('DVD7', 18, 'Autres', 15, 22);
INSERT INTO public.stockarticle VALUES ('DVD8', 14, 'Autres', 15, 23);
INSERT INTO public.stockarticle VALUES ('DVD9', 14, 'Autres', 15, 24);
INSERT INTO public.stockarticle VALUES ('DVD10', 15, 'Autres', 25, 25);
INSERT INTO public.stockarticle VALUES ('DVD11', 18, 'Autres', 25, 26);
INSERT INTO public.stockarticle VALUES ('DVD12', 75, 'Autres', 75, 27);
INSERT INTO public.stockarticle VALUES ('DVD13', 15, 'Autres', 14, 28);
INSERT INTO public.stockarticle VALUES ('DVD14', 14, 'Autres', 17, 29);
INSERT INTO public.stockarticle VALUES ('DVD15', 18, 'Autres', 18, 30);
INSERT INTO public.stockarticle VALUES ('VE1', 51, 'Enfant', 40, 31);
INSERT INTO public.stockarticle VALUES ('VE2', 14, 'Enfant', 15, 32);
INSERT INTO public.stockarticle VALUES ('VE3', 14, 'Enfant', 75, 33);
INSERT INTO public.stockarticle VALUES ('VE4', 75, 'Enfant', 45, 34);
INSERT INTO public.stockarticle VALUES ('VE5', 45, 'Enfant', 74, 35);
INSERT INTO public.stockarticle VALUES ('VE6', 17, 'Enfant', 41, 36);
INSERT INTO public.stockarticle VALUES ('VE7', 45, 'Enfant', 45, 37);
INSERT INTO public.stockarticle VALUES ('VE8', 75, 'Enfant', 15, 38);
INSERT INTO public.stockarticle VALUES ('VE9', 45, 'Enfant', 45, 39);
INSERT INTO public.stockarticle VALUES ('VE11', 14, 'Enfant', 45, 40);
INSERT INTO public.stockarticle VALUES ('VE12', 14, 'Enfant', 85, 41);
INSERT INTO public.stockarticle VALUES ('VE13', 117, 'Enfant', 75, 42);
INSERT INTO public.stockarticle VALUES ('VE14', 112, 'Enfant', 85, 43);
INSERT INTO public.stockarticle VALUES ('VE15', 15, 'Enfant', 14, 44);
INSERT INTO public.stockarticle VALUES ('VE16', 17, 'Enfant', 75, 45);
INSERT INTO public.stockarticle VALUES ('VF1', 15, 'Femme', 45, 46);
INSERT INTO public.stockarticle VALUES ('VF2', 75, 'Femme', 75, 47);
INSERT INTO public.stockarticle VALUES ('VF4', 75, 'Femme', 75, 48);
INSERT INTO public.stockarticle VALUES ('VF5', 45, 'Femme', 45, 49);
INSERT INTO public.stockarticle VALUES ('VF6', 45, 'Femme', 60, 50);
INSERT INTO public.stockarticle VALUES ('VF7', 75, 'Femme', 45, 51);
INSERT INTO public.stockarticle VALUES ('VF8
', 85, 'Femme', 74, 52);
INSERT INTO public.stockarticle VALUES ('VF9', 45, 'Femme', 48, 53);
INSERT INTO public.stockarticle VALUES ('VF10', 74, 'Femme', 45, 54);
INSERT INTO public.stockarticle VALUES ('VF11', 45, 'Femme', 47, 55);
INSERT INTO public.stockarticle VALUES ('VF12', 47, 'Femme', 74, 56);
INSERT INTO public.stockarticle VALUES ('VF13', 75, 'Femme', 41, 57);
INSERT INTO public.stockarticle VALUES ('VF14', 54, 'Femme', 45, 58);
INSERT INTO public.stockarticle VALUES ('VF15', 75, 'Femme', 14, 59);
INSERT INTO public.stockarticle VALUES ('VF16', 45, 'Femme', 45, 60);
INSERT INTO public.stockarticle VALUES ('VH1', 75, 'Homme', 49, 61);
INSERT INTO public.stockarticle VALUES ('VH3', 65, 'Homme', 74, 62);
INSERT INTO public.stockarticle VALUES ('VH4', 75, 'Homme', 75, 63);
INSERT INTO public.stockarticle VALUES ('VH5', 45, 'Homme', 45, 64);
INSERT INTO public.stockarticle VALUES ('VH6', 74, 'Homme', 41, 65);
INSERT INTO public.stockarticle VALUES ('VH7', 45, 'Homme', 77, 66);
INSERT INTO public.stockarticle VALUES ('VH8', 75, 'Homme', 41, 67);
INSERT INTO public.stockarticle VALUES ('VH9', 45, 'Homme', 41, 68);
INSERT INTO public.stockarticle VALUES ('VH10', 14, 'Homme', 14, 69);
INSERT INTO public.stockarticle VALUES ('VH11', 45, 'Homme', 65, 70);
INSERT INTO public.stockarticle VALUES ('VH12', 54, 'Homme', 17, 71);
INSERT INTO public.stockarticle VALUES ('VH13', 10, 'Homme', 45, 72);
INSERT INTO public.stockarticle VALUES ('VH14', 54, 'Homme', 65, 73);
INSERT INTO public.stockarticle VALUES ('VH15', 15, 'Homme', 35, 74);
INSERT INTO public.stockarticle VALUES ('VH16', 45, 'Homme', 45, 75);
INSERT INTO public.stockarticle VALUES ('VE10', 44, 'Enfant', 75, 76);
INSERT INTO public.stockarticle VALUES ('VF3', 44, 'Femme', 85, 77);
INSERT INTO public.stockarticle VALUES ('VH2', 94, 'Homme', 15, 78);
INSERT INTO public.stockarticle VALUES ('DVD16', 1, 'Autres', 25, 79);
INSERT INTO public.stockarticle VALUES ('B2', 14, 'Autres', 15, 1);
INSERT INTO public.stockarticle VALUES ('B1', 0, 'Autres', 10, 80);


--
-- TOC entry 2225 (class 0 OID 0)
-- Dependencies: 199
-- Name: client_idclient_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.client_idclient_seq', 18, true);


--
-- TOC entry 2226 (class 0 OID 0)
-- Dependencies: 196
-- Name: commande_idclient_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.commande_idclient_seq', 1, false);


--
-- TOC entry 2227 (class 0 OID 0)
-- Dependencies: 197
-- Name: commande_montant_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.commande_montant_seq', 1, false);


--
-- TOC entry 2228 (class 0 OID 0)
-- Dependencies: 201
-- Name: panier_idclient_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.panier_idclient_seq', 1, false);


--
-- TOC entry 2229 (class 0 OID 0)
-- Dependencies: 202
-- Name: panier_prix_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.panier_prix_seq', 1, false);


--
-- TOC entry 2230 (class 0 OID 0)
-- Dependencies: 206
-- Name: stockarticle_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.stockarticle_id_seq', 80, true);


--
-- TOC entry 2231 (class 0 OID 0)
-- Dependencies: 204
-- Name: stockarticle_stock_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.stockarticle_stock_seq', 1, false);


--
-- TOC entry 2075 (class 2606 OID 33172)
-- Name: client Unique_Key; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.client
    ADD CONSTRAINT "Unique_Key" UNIQUE (mail);


--
-- TOC entry 2077 (class 2606 OID 25005)
-- Name: client client_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.client
    ADD CONSTRAINT client_pkey PRIMARY KEY (idclient);


--
-- TOC entry 2079 (class 2606 OID 25030)
-- Name: stockarticle stockarticle_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.stockarticle
    ADD CONSTRAINT stockarticle_pkey PRIMARY KEY (narticle);


-- Completed on 2019-05-30 22:55:17

--
-- PostgreSQL database dump complete
--

