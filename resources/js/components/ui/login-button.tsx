import { useForm } from '@inertiajs/react';
import routing from '@/actions/Illuminate/Routing';
export default function LoginButton () {

    interface LoginData {
        email: string;
        password: string;
        remember: boolean;
    }

    const {data, setData, post, processing, errors, reset} = useForm({
        email:'',
        password:'',
        remember: false,
    });

    const submit = (e: React.FormEvent) => {
        e.preventDefault();
        post('login'),{
           onFinish: () => reset('password')
        };
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
