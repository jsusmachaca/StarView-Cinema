function Formulario(titulo) {
     var fila = document.getElementById(titulo);
     var titulo = fila.cells[0].innerHTML;
     var info = fila.cells[1].innerHTML;
     var duracion = fila.cells[2].innerHTML;
     var precio = fila.cells[3].innerHTML;
     var taquilla = fila.cells[4].innerHTML;
     var banner = fila.cells[5].innerHTML;

     document.getElementsByName("titulo")[0].value = titulo;
     document.getElementsByName("info")[0].value = info;
     document.getElementsByName("duracion")[0].value = duracion;
     document.getElementsByName("precio")[0].value = precio;
     document.getElementsByName("taquilla")[0].value = taquilla;
     document.getElementsByName("banner")[0].value = banner;

}

function FormularioEmp(id_emp) {
     var fila = document.getElementById(id_emp);     
     var nombres = fila.cells[0].innerHTML;
     var apelllidos = fila.cells[1].innerHTML;
     var id = fila.cells[2].innerHTML;
     var dni = fila.cells[3].innerHTML;
     var sueldo = fila.cells[4].innerHTML;
     var horas = fila.cells[5].innerHTML;
     var telefono = fila.cells[6].innerHTML;
     
     document.getElementsByName("nombres")[0].value = nombres;
     document.getElementsByName("apelllidos")[0].value = apelllidos;
     document.getElementsByName("id_emp")[0].value = id;
     document.getElementsByName("dni")[0].value = dni;
     document.getElementsByName("sueldo")[0].value = sueldo;
     document.getElementsByName("horas_trabajo")[0].value = horas;
     document.getElementsByName("telefono")[0].value = telefono; 
}

function FormularioUser(name) {
     var fila = document.getElementById(name);     
     var name = fila.cells[0].innerHTML;
     var email = fila.cells[1].innerHTML;    
     var password = fila.cells[2].innerHTML;
     var is_admin = fila.cells[3].innerHTML;

     
     document.getElementsByName("name")[0].value = name;
     document.getElementsByName("email")[0].value = email;
     document.getElementsByName("password")[0].value = password;
     document.getElementsByName("is_admin")[0].value = is_admin;
}

function FormularioReser(id) {
     var fila = document.getElementById(id);     
     var id = fila.cells[0].innerHTML;
     var nombre = fila.cells[1].innerHTML;    
     var pelicula = fila.cells[2].innerHTML;
     var cantidad_boletos = fila.cells[3].innerHTML;
     var created_at = fila.cells[4].innerHTML;


     document.getElementsByName("id")[0].value = id;
     document.getElementsByName("nombre")[0].value = nombre;
     document.getElementsByName("pelicula")[0].value = pelicula;
     document.getElementsByName("cantidad_boletos")[0].value = cantidad_boletos;
     document.getElementsByName("created_at")[0].value = created_at;
}