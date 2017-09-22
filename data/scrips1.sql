
-- mantencion proxima semana y sirve para la actual
select equipo.equipo_actividad, semana.semana
from mantencion_programa_semana as semana inner join mantencion_equipo_actividad as equipo
on equipo.id_equipo = semana.id_equipo
where semana.semana = 'SEM38'
order by equipo.equipo_actividad;

-- mantencion pendiente
select equipo.equipo_actividad, semana.semana
from mantencion_programa_semana as semana inner join mantencion_equipo_actividad as equipo
on equipo.id_equipo = semana.id_equipo
where semana.orden_trabajo is null or semana.orden_trabajo = ''
order by semana.semana, equipo.equipo_actividad;

-- se encuentran pendientes las siguientes mantenciones:
-- Existen 34 equipos con mantencion pendiente... ir al listado...
select count(1) as cantidad_mantenciones_pendientes
from mantencion_programa_semana as semana inner join mantencion_equipo_actividad as equipo
on equipo.id_equipo = semana.id_equipo
where semana.orden_trabajo is null or semana.orden_trabajo = ''
order by semana.semana, equipo.equipo_actividad;


select semana, count()
from mantencion_programa_semana
order by semana

-- equipos sin un programa de mantencion..
select equipo.equipo_actividad
from mantencion_programa_semana as semana RIGHT join mantencion_equipo_actividad as equipo
on equipo.id_equipo = semana.id_equipo
order by equipo.equipo_actividad;
