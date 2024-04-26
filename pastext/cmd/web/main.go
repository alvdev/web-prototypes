package main

import (
	"flag"
	"log"
	"net/http"
	"os"
)

type application struct {
	errorLog *log.Logger
	infoLog  *log.Logger
}

func main() {
	infoLog := log.New(os.Stdout, "INFO:\t", log.Ldate|log.Ltime)
	errorLog := log.New(os.Stderr, "ERROR:\t", log.Ldate|log.Ltime|log.Lshortfile)

	app := &application{
		infoLog:  infoLog,
		errorLog: errorLog,
	}

	addr := flag.String("addr", ":8080", "Listen HTTP address")
	flag.Parse()

	mux := http.NewServeMux()
	fileServer := http.FileServer(http.Dir("./ui/dist/"))

	mux.Handle("/dist/", http.StripPrefix("/dist/", fileServer))
	mux.HandleFunc("/", app.home)
	mux.HandleFunc("/text/view", app.textView)
	mux.HandleFunc("/text/create", app.textCreate)

	srv := &http.Server{
		Addr:     *addr,
		ErrorLog: errorLog,
		Handler:  mux,
	}

	infoLog.Printf("Starting server on %v", *addr)
	err := srv.ListenAndServe()
	errorLog.Fatal(err)
}
