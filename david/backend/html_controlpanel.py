"""
An example how to generate java code from textX model using jinja2
template engine (http://jinja.pocoo.org/docs/dev/)
"""
from os import mkdir
from os.path import exists, dirname, join
import jinja2
from entity_test import get_entity_mm


def html_controlpanel(this_folder, debug):

    entity_mm = get_entity_mm(debug)

    # Build Person model from person.ent file
    person_model = entity_mm.model_from_file(join(this_folder, 'person.ent'))

    # Create output folder
    srcgen_folder = join(this_folder, 'srcgen/')
    if not exists(srcgen_folder):
        mkdir(srcgen_folder)

    # Initialize template engine.
    jinja_env = jinja2.Environment(
        loader=jinja2.FileSystemLoader(this_folder),
        trim_blocks=True,
        lstrip_blocks=True)

    template = jinja_env.get_template('backend/templates/html_controlpanel.template')

    for ent in person_model.classes:
        for entity in ent.entities:
            entity._model_name = person_model.name
            with open(join(srcgen_folder,
                           "controlPanel%s.php" % entity.name.capitalize()), 'w') as f:
                f.write(template.render(entity=entity))



if __name__ == "__main__":
    main()
