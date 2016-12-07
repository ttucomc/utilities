
import CreateAdministrator from '../../components/CreateAdministrator.vue';

describe('CreateAdministrator', () => {
    it('should be able to display a form to add a new administrator to the database', function() {
        expect($('<span class="card-title">Create New Administrator</span>')).toHaveText('Create New Administrator');
    })
});
