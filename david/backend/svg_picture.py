from os import mkdir
from os.path import exists, dirname, join
import jinja2
from entity_test import get_entity_mm

def svg_picture(this_folder, debug):


    entity_mm = get_entity_mm(debug)

    # Build Person model from person.ent file
    person_model = entity_mm.model_from_file(join(this_folder, 'person.ent'))


    # Create output folder
    srcgen_folder = join(this_folder, 'srcgen/images')
    if not exists(srcgen_folder):
        mkdir(srcgen_folder)

    # Initialize template engine.
    jinja_env = jinja2.Environment(
        loader=jinja2.FileSystemLoader(this_folder),
        trim_blocks=True,
        lstrip_blocks=True)

    # Load Java template
    template = jinja_env.get_template('backend/templates/img.template')

    for ent in person_model.classes:
        # For each entity generate java file
        with open(join(srcgen_folder,
                       "%s.svg" % 'banner'), 'w') as f:
            f.write(template.render(ent=ent))
