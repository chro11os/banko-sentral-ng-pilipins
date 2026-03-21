import { useForm } from '@inertiajs/react';
export default function LoginButton () {
    const {data, setData, post, processing, errors} = useForm({
        email:'',
        password:'',
    });

    const submit = (e: any) => {
        e.preventDefault();
        post('/login');
    }

    return (
        <form onSubmit={submit}>
            <button
                type="submit"
                className="bg-brand-red rounded-xs text-brand-cream shadow-md p-3 font-sans hover:bg-red-900"
            >
                Login
            </button>
        </form>
    )
}
