<?php 

$host = "ec2-54-235-193-34.compute-1.amazonaws.com";
$port = "5432";
$dbname = "davr0mgicaope3";
$user = "yjhycgfinommke";
$password = "2d7534479e9a997e2754ef3e17d5ab0d35e4e9048c81f7b595bedbb551d9a942";
$pg_options = "--client_encoding=UTF8";

$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} options='{$pg_options}'";
$dbconn = pg_connect($connection_string);


if($dbconn){
    echo "Connected to ". pg_host($dbconn); 
}else{
    echo "Error in connecting to database.";
}

$sql = "CREATE TABLE public."jokerUser"
(
    "idUser" integer NOT NULL DEFAULT nextval('"jokerUser_idUser_seq"'::regclass),
    nama bit varying(50)[] NOT NULL,
    email bit varying(50)[] NOT NULL,
    password text COLLATE pg_catalog."default" NOT NULL,
    "ratingPekerja" numeric(1,0)[],
    "ratingTuan" numeric(1,0)[],
    "noKontak" bit varying(12)[] NOT NULL,
    foto text COLLATE pg_catalog."default",
    CONSTRAINT "jokerUser_pkey" PRIMARY KEY ("idUser")
)";

$result = pg_query($dbconn, $sql);
if(!$result){
  echo pg_last_error($dbconn);
} else {
  echo "Table created successfully";
}
?>
