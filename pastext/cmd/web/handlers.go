package main

import (
	"fmt"
	"html/template"
	"log"
	"net/http"
	"strconv"
)

func home(w http.ResponseWriter, r *http.Request) {
	if r.URL.Path != "/" {
		// Default 404 error
		// http.NotFound(w, r)
		w.Write([]byte("<h1>Error 404: Page not found</h1>"))
		return
	}

	files := []string{
		"ui/html/base.tmpl",
		"ui/html/partials/nav.tmpl",
		"ui/html/pages/home.tmpl",
	}

	ts, err := template.ParseFiles(files...)
	if err != nil {
		log.Print(err.Error())
		http.Error(w, "Internal server error", 500)
		return
	}

	err = ts.ExecuteTemplate(w, "base", nil)
	if err != nil {
		log.Print(err.Error())
		http.Error(w, "Internal server error", 500)
	}

	w.Write([]byte("<h1>Hello from Pastext</h1>"))
}

func textView(w http.ResponseWriter, r *http.Request) {
	id, err := strconv.Atoi(r.URL.Query().Get("id"))
	if err != nil || id < 1 {
		http.NotFound(w, r)
		return
	}

	fmt.Fprintf(w, "Display a specific text with ID %d", id)
	w.Write([]byte("<h1>View text page</h1>"))
}

func textCreate(w http.ResponseWriter, r *http.Request) {
	if r.Method != "POST" {
		w.Header().Set("Allow", http.MethodPost)
		w.Header().Add("Cache-Control", "public, max-age=31536000")
		// w.WriteHeader(405)
		// w.Write([]byte("<h1>Method not allowed...</h1>"))
		http.Error(w, "Method not allowed...", http.StatusMethodNotAllowed) // Send plain text

		cacheControlValues := w.Header().Values("Cache-Control")
		var valuesStr string
		for _, value := range cacheControlValues {
			valuesStr = valuesStr + " " + value
		}
		w.Write([]byte(valuesStr))
		return
	}

	w.Write([]byte("<h1>Create text page</h1>"))
}
